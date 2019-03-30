<?php

/*
 * Helper functions for building a DataTables server-side processing SQL query
 *
 * The static functions in this class are just helper functions to help build
 * the SQL used in the DataTables demo server-side processing scripts. These
 * functions obviously do not represent all that can be done with server-side
 * processing, they are intentionally simple to show how it works. More complex
 * server-side processing operations will likely require a custom script.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

namespace App\Helper;

use App\Issue;
use App\Order;
use App\Services\IssueService;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Request;
use Molayli\CloudflareRealIpServiceProvider;

class PayTR
{

    protected $issueService;

    /**
     * Merchant credentials.
     *
     * @var string $merchant_id
     * @var string $merchant_key
     * @var string $merchant_salt
     */
    private $merchant_id;
    private $merchant_key;
    private $merchant_salt;

    /**
     * Merchant return URLs.
     *
     * @var string $merchant_ok_url
     * @var string $merchant_fail_url
     */
    private $merchant_ok_url;
    private $merchant_fail_url;

    /**
     * Other settings
     *
     * @var string $debug_on
     * @var string $test_mode
     * @var string $timeout_limit
     * @var string $no_installment
     * @var string $max_installment
     */
    private $debug_on;
    private $test_mode;
    private $timeout_limit = 30; // minute
    private $no_installment = 1; // 1 => no installment, 0 => support installment and set $max_installment variable.
    private $max_installment = 0; // 0 => maximum installment set by system defaults, 1-12 => installment number

    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;

        $this->merchant_id = config('paytr.merchant_id');
        $this->merchant_key = config('paytr.merchant_key');
        $this->merchant_salt = config('paytr.merchant_salt');

        $this->merchant_ok_url = config('paytr.merchant_ok_url');
        $this->merchant_fail_url = config('paytr.merchant_fail_url');

        $this->debug_on = intval(config('app.debug'));
        $this->test_mode = intval(config('app.debug'));
    }

    /**
     * Get token for payment form.
     *
     * @param Order $order
     * @param integer $payment_amount // float * 100. for example; 9.99 * 100 = 999
     * @param string $currency // TL, USD
     * @param string $user_email // customer email
     * @param string $user_name // customer name, surname
     * @param string $user_address // customer address
     * @param string $user_phone // customer phone number
     * @param array $user_basket // customer basket. [['title', 'price', 'amount']]
     *
     * @return string
     */
    public function getToken($order, $payment_amount, $currency, $user_email, $user_name, $user_address, $user_phone, $user_basket)
    {
        $user_ip = CloudflareRealIpServiceProvider::ip();
        $user_basket = base64_encode(json_encode($user_basket));

        $hash_str = $this->merchant_id . $user_ip . $order->id . $user_email . $payment_amount . $user_basket . $this->no_installment . $this->max_installment . $currency . $this->test_mode;
        $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $this->merchant_salt, $this->merchant_key, true));
        $post_vals = [
            'merchant_id' => $this->merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $order->id,
            'email' => $user_email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $this->debug_on,
            'no_installment' => $this->no_installment,
            'max_installment' => $this->max_installment,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $this->merchant_ok_url,
            'merchant_fail_url' => $this->merchant_fail_url,
            'timeout_limit' => $this->timeout_limit,
            'currency' => $currency,
            'test_mode' => $this->test_mode
        ];

        $response = (new Client())->post('https://www.paytr.com/odeme/api/get-token', [
            'form_params' => $post_vals
        ]);

        $result = json_decode($response->getBody(), 1);

        if ($result['status'] != 'success') {
            $order->update([
                'status' => 'unsuccessful'
            ]);
            dd("PAYTR IFRAME failed. reason:" . $result['reason']);
        }

        return $result['token'];
    }

    /**
     * Paytr Callback method.
     *
     * @param integer $merchant_oid
     * @param string $status
     * @param string $total_amount
     * @param string $request_hash
     *
     * @return void
     */
    public function callback($merchant_oid, $status, $total_amount, $request_hash)
    {
        $hash = base64_encode(hash_hmac('sha256', $merchant_oid . $this->merchant_salt . $status . $total_amount, $this->merchant_key, true));

        if ($hash != $request_hash)
            dd('PAYTR notification failed: bad hash');

        $order = Order::where('id', $merchant_oid)->first();
        $issue = Issue::where('language', $order->language)->where('issue', $order->issues[0])->first();

        if ($status == 'success') {
            $order->status = 'successful';
            $this->issueService->assignIssueToUser($order->user, $issue, $order);
        } else {
            $order->status = 'unsuccessful';
        }
        $order->save();
    }

}

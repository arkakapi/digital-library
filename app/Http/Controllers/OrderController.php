<?php

namespace App\Http\Controllers;

use App\Helper\PayTR;
use App\Services\IssueService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $issueService;

    /**
     * Create a new controller instance.
     *
     * @param IssueService $issueService
     *
     * @return void
     */
    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
    }

    /**
     * PayTR Callback URL
     *
     * @param Request $request
     *
     * @return string
     */
    public function paytrCallback(Request $request)
    {
        (new PayTR($this->issueService))->callback(
            $request->get('merchant_oid'),
            $request->get('status'),
            $request->get('total_amount'),
            $request->get('hash')
        );

        return 'OK';
    }

}

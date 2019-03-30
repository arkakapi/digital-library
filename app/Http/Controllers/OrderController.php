<?php

namespace App\Http\Controllers;

use App\Helper\PayTR;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * PayTR Callback URL
     *
     * @param Request $request
     *
     * @return string
     */
    public function paytrCallback(Request $request)
    {
        (new PayTR())->callback(
            $request->get('merchant_oid'),
            $request->get('status'),
            $request->get('total_amount'),
            $request->get('hash')
        );

        return 'OK';
    }

}

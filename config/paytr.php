<?php

return [

    'merchant_id' => env('PAYTR_merchant_id'),
    'merchant_key' => env('PAYTR_merchant_key'),
    'merchant_salt' => env('PAYTR_merchant_salt'),

    'merchant_ok_url' => env('APP_URL') . '/my-purchases',
    'merchant_fail_url' => env('APP_URL') . '/paytr/error',

];

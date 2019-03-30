<?php

namespace App\Http\Controllers;

use App\Helper\PayTR;
use App\Services\IssueService;
use App\Services\PackageService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $issueService;
    protected $packageService;

    /**
     * Create a new controller instance.
     *
     * @param IssueService $issueService
     * @param PackageService $packageService
     *
     * @return void
     */
    public function __construct(IssueService $issueService, PackageService $packageService)
    {
        $this->issueService = $issueService;
        $this->packageService = $packageService;
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
        (new PayTR($this->issueService, $this->packageService))->callback(
            $request->get('merchant_oid'),
            $request->get('status'),
            $request->get('total_amount'),
            $request->get('hash')
        );

        return 'OK';
    }

}

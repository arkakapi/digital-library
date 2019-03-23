<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;


class LogController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('json'))
            return response()->json(
                Datatables::simple($request->all(), 'logs', 'id', $this->logService->getDatatableColumns())
            );

        return view('admin.datatables', [
            'title' => 'Kullanıcı Logları',
            'thead' => ['id', 'user_id', 'Eposta', 'Action', 'IP Adresi', 'Tarih'],
            'columnDefs' => [2]
        ]);
    }

}

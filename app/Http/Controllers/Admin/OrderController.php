<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;


class OrderController extends AdminController
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
                Datatables::simple($request->all(), 'orders', 'id', $this->orderService->getDatatableColumns())
            );

        return view('admin.datatables', [
            'title' => 'Sipariş Geçmişi',
            'thead' => ['id', 'Eposta', 'Ürün', 'Sayılar', 'Toplam', 'Tarih'],
            'columnDefs' => [1]
        ]);
    }

}

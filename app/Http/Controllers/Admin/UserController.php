<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Helper\Datatables;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_GET['json']))
            return view('admin.datatables', [
                'title' => 'Kullanıcılar',
                'thead' => ['id', 'Yetki', 'Adı-Soyadı', 'Eposta', 'Ülke', 'Dil', 'Meslek', 'Düzenle'],
            ]);

        $table = 'users';
        $primaryKey = 'id';
        $columns = [
            ['db' => 'id', 'dt' => 0],
            [
                'db' => 'role',
                'dt' => 1,
                'formatter' => function ($data) {
                    return '<span class="btn btn-sm btn-' . ($data == 'admin' ? 'danger' : 'primary') . '">' . $data . '</span>';
                }
            ],
            ['db' => 'name', 'dt' => 2],
            ['db' => 'email', 'dt' => 3],
            [
                'db' => 'country_id',
                'dt' => 4,
                'formatter' => function ($data) {
                    return Country::find($data)->name;
                }
            ],
            ['db' => 'language', 'dt' => 5],
            ['db' => 'job', 'dt' => 6],
            [
                'db' => 'id',
                'dt' => 7,
                'formatter' => function ($data) {
                    return '<a href="' . route('admin.users.edit', $data) . '" class="btn btn-sm btn-primary">Düzenle</a>';
                }
            ]
        ];

        return response()->json(
            Datatables::simple($_GET, $table, $primaryKey, $columns)
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::flash('class', 'warning');
        Session::flash('message', 'Kullanıcı ekleme modülü aktif değil. Eklemek istediğiniz kişiyi Kayıt formuna yönlendirin, kendi kayıt olsun.');
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', [
            'user' => User::findOrFail($id),
            'countries' => Country::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => ['required', 'string', 'regex:(admin|subscriber)'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'country_id' => ['required', 'exists:countries,id'],
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        if (!$request->input('password'))
            unset($data['password']);

        User::findOrFail($id)->fill($data)->save();

        Session::flash('class', 'success');
        Session::flash('message', 'Kullanıcı başarıyla güncellendi!');

        return redirect()->route('admin.users.edit', $id);
    }
}

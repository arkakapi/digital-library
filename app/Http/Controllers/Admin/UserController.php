<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Events\UserAdded;
use App\Helper\Datatables;
use App\Issue;
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
                'thead' => ['id', 'Admin?', 'Ban Durumu', 'Adı - Soyadı', 'Eposta', 'Ülke', 'Dil', 'Meslek', 'Düzenle'],
            ]);

        $table = 'users';
        $primaryKey = 'id';
        $columns = [
            ['db' => 'id', 'dt' => 0],
            [
                'db' => 'is_admin',
                'dt' => 1,
                'formatter' => function ($data) {
                    return '<span class="btn btn-sm btn-' . ($data ? 'success' : 'danger') . '" > ' . ($data ? 'evet' : 'hayır') . ' </span>';
                }
            ],
            [
                'db' => 'is_banned',
                'dt' => 2,
                'formatter' => function ($data) {
                    return '<span class="btn btn-sm btn-' . ($data ? 'danger' : 'success') . '" > ' . ($data ? 'banlı' : 'temiz') . ' </span>';
                }
            ],
            ['db' => 'name', 'dt' => 3],
            ['db' => 'email', 'dt' => 4],
            [
                'db' => 'country_id',
                'dt' => 5,
                'formatter' => function ($data) {
                    return Country::find($data)->name;
                }
            ],
            ['db' => 'language', 'dt' => 6],
            ['db' => 'job', 'dt' => 7],
            [
                'db' => 'id',
                'dt' => 8,
                'formatter' => function ($data) {
                    return '<a href = "' . route('admin.users.edit', $data) . '" class="btn btn-sm btn-primary"> Düzenle</a>';
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
        return view('admin.users.create', [
            'countries' => Country::all(),
            'issues_all_count' => Issue::all('id')->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'is_admin' => ['required', 'boolean'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'country_id' => ['required', 'exists:countries,id'],
        ]);
        $data = $request->all();

        // Set and map TR purchases
        $purchases_tr = array_map(function ($value) {
            return (int)$value;
        }, $request->input('purchases_tr') ?: []);
        $data['purchases_tr'] = json_encode($purchases_tr);

        // Set and map EN purchases
        $purchases_en = array_map(function ($value) {
            return (int)$value;
        }, $request->input('purchases_en') ?: []);
        $data['purchases_en'] = json_encode($purchases_en);

        // Create user
        $user = User::create($data);

        // Trigger events
        event(new UserAdded($user));

        // Return
        Session::flash('class', 'success');
        Session::flash('message', 'Kullanıcı başarıyla eklendi!');

        return redirect()->route('admin.users.edit', $user->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', [
            'user' => $user,
            'countries' => Country::all(),
            'issues_all_count' => Issue::all('id')->count(),
            'purchases_tr' => json_decode($user->purchases_tr, true),
            'purchases_en' => json_decode($user->purchases_en, true)
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
            'is_admin' => ['required', 'boolean'],
            'is_banned' => ['required', 'boolean'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'country_id' => ['required', 'exists:countries,id'],
        ]);
        $data = $request->all();

        // Set password (if sent)
        $data['password'] = Hash::make($request->input('password'));
        if (!$request->input('password'))
            unset($data['password']);

        // Set and map TR purchases
        $purchases_tr = array_map(function ($value) {
            return (int)$value;
        }, $request->input('purchases_tr') ?: []);
        $data['purchases_tr'] = json_encode($purchases_tr);

        // Set and map EN purchases
        $purchases_en = array_map(function ($value) {
            return (int)$value;
        }, $request->input('purchases_en') ?: []);
        $data['purchases_en'] = json_encode($purchases_en);

        // Update user
        User::findOrFail($id)->fill($data)->save();

        // Return
        Session::flash('class', 'success');
        Session::flash('message', 'Kullanıcı başarıyla güncellendi!');

        return redirect()->route('admin.users.edit', $id);
    }

}

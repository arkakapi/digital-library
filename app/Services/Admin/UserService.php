<?php

namespace App\Services\Admin;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{

    /**
     * Return datatable columns for Datatable.
     *
     * @return array
     */
    public function getDatatableColumns()
    {
        return [
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
    }

}

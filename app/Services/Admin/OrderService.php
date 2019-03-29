<?php

namespace App\Services\Admin;

use App\User;

class OrderService
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
                'db' => 'user_id',
                'dt' => 1,
                'formatter' => function ($data, $row) {
                    return User::find($data)->email;
                }
            ],
            [
                'db' => 'language',
                'dt' => 2,
                'formatter' => function ($data, $row) {
                    return ($data == 'tr' ? 'Arka Kapı Dergi' : 'Arka Kapı Magazine');
                }
            ],
            ['db' => 'issues', 'dt' => 3],
            [
                'db' => 'status',
                'dt' => 4,
                'formatter' => function ($data, $row) {
                    $class = '';
                    $class = $data == 'successful' ? 'success' : $class;
                    $class = $data == 'unsuccessful' ? 'danger' : $class;
                    $class = $data == 'pending' ? 'warning' : $class;
                    return '<span class="btn btn-sm btn-' . $class . '" > ' . $data . ' </span>';
                }
            ],
            ['db' => 'total', 'dt' => 5],
            ['db' => 'created_at', 'dt' => 6],
        ];
    }

}

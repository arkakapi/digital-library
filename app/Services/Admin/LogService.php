<?php

namespace App\Services\Admin;

use App\User;

class LogService
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
            ['db' => 'user_id', 'dt' => 1],
            [
                'db' => 'user_id',
                'dt' => 2,
                'formatter' => function ($data, $row) {
                    return User::find($data)->email;
                }
            ],
            ['db' => 'action', 'dt' => 3],
            ['db' => 'ip_address', 'dt' => 4],
            ['db' => 'created_at', 'dt' => 5],
        ];
    }

}

<?php

namespace App\Services\Admin;

use Illuminate\Http\Request;

class PackageService
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
            ['db' => 'title', 'dt' => 1],
            ['db' => 'language', 'dt' => 2],
            [
                'db' => 'price',
                'dt' => 3,
                'formatter' => function ($data, $row) {
                    return $data . ' ' . ($row['language'] == 'tr' ? 'TL' : 'USD');
                }
            ],
            ['db' => 'issues', 'dt' => 4],
            [
                'db' => 'id',
                'dt' => 5,
                'formatter' => function ($data) {
                    return '<a href="' . route('admin.packages.edit', $data) . '" class="btn btn-sm btn-primary">Düzenle</a>';
                }
            ]
        ];
    }

}

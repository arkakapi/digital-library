<?php

namespace App\Services\Admin;

use App\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IssueService
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
            ['db' => 'issue', 'dt' => 2],
            [
                'db' => 'price',
                'dt' => 3,
                'formatter' => function ($data, $row) {
                    return $data . ' ' . ($row['language'] == 'tr' ? 'TL' : 'USD');
                }
            ],
            ['db' => 'month', 'dt' => 4],
            [
                'db' => 'language',
                'dt' => 5,
                'formatter' => function ($data) {
                    if ($data == 'tr')
                        return '<span class="label label-success">Türkçe (Arka Kapı Dergi)</span>';
                    return '<span class="label label-info">İngilizce (Arka Kapı Magazine)</span>';
                }
            ],
            [
                'db' => 'slug',
                'dt' => 6,
                'formatter' => function ($data) {
                    return '<a href="' . config('app.url') . '/storage/' . $data . '.jpg" target="_blank">' . $data . '.jpg</a>';
                }
            ],
            [
                'db' => 'id',
                'dt' => 7,
                'formatter' => function ($data) {
                    return '<a href="' . route('admin.issues.edit', $data) . '" class="btn btn-sm btn-primary">Düzenle</a>';
                }
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        // Create title
        $title = 'Arka Kapı Dergi Sayı ' . $request->input('issue');
        if ($request->input('language') == 'en')
            $title = 'Arka Kapı Magazine Issue ' . $request->input('issue');

        // Create slug
        $slug = str_slug($title, '-', 'tr');

        // Upload Cover
        $cover = $request->file('cover');
        Storage::disk('public')->put($slug . '.jpg', file_get_contents($cover));

        // Upload PDF
        $pdf = $request->file('pdf');
        Storage::disk('local')->put($slug . '.pdf', file_get_contents($pdf));

        // Create issue
        $data = $request->all();
        $data['slug'] = $slug;
        $data['title'] = $title;

        return $data;
    }

    /**
     * Update PDF file.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Issue $issue
     * @param  string $slug
     */
    public function updatePdf(Request $request, Issue $issue, $slug)
    {
        // Upload new PDF
        if ($request->file('pdf')) {
            $pdf = $request->file('pdf');
            Storage::disk('local')->put($slug . '.pdf', file_get_contents($pdf));
            Storage::disk('local')->delete($issue->slug . '.pdf');
        } else if ($issue->slug != $slug) {
            // If changed title and not selected any pdf, change pdf file name
            Storage::disk('local')->move($issue->slug . '.pdf', $slug . '.pdf');
        }
    }

    /**
     * Update Cover image file.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Issue $issue
     * @param  string $slug
     */
    public function updateCover(Request $request, Issue $issue, $slug)
    {
        // Upload new Cover
        if ($request->file('cover')) {
            $cover = $request->file('cover');
            Storage::disk('public')->put($slug . '.jpg', file_get_contents($cover));
            Storage::disk('public')->delete($issue->slug . '.jpg');
        } else if ($issue->slug != $slug) {
            // If changed title and not selected any cover, change cover file name
            Storage::disk('public')->move($issue->slug . '.jpg', $slug . '.jpg');
        }
    }

}

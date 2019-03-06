<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Datatables;
use App\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class IssueController extends AdminController
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
                'title' => 'Sayılar',
                'thead' => ['id', 'Başlık', 'Sayı', 'Fiyat', 'Ay/Yıl', 'Dil', 'Kapak', 'Düzenle'],
            ]);

        $table = 'issues';
        $primaryKey = 'id';
        $columns = [
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
        return view('admin.issues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => ['required', 'string', 'starts_with:Arka Kapı'],
            'price' => ['required', 'between:0,99.99'],
            'month' => ['required', 'string'],
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'content' => ['required', 'string'],
        ]);

        // Create slug
        $slug = str_slug($request->input('title'), '-', 'tr');

        // Upload Cover
        $cover = $request->file('cover');
        $cover_filename = $slug . '.' . $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover_filename, file_get_contents($cover));

        // Create issue
        $issue = new Issue();
        $issue->slug = $slug;
        $issue->title = $request->input('title');
        $issue->price = $request->input('price');
        $issue->cover = $cover_filename;
        $issue->month = $request->input('month');
        $issue->content = $request->input('content');
        $issue->language = $request->input('language');
        $issue->save();


        // Redirect Issues page
        Session::flash('class', 'success');
        Session::flash('message', 'Yeni sayi başarıyla yüklendi! Üyelere hatırlatma epostası göndermeyi unutmayın!');

        return redirect()->route('admin.issues.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);

        return view('admin.issues.edit', [
            'issue' => $issue
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
        // Validation
        $request->validate([
            'title' => ['required', 'string', 'starts_with:Arka Kapı'],
            'price' => ['required', 'between:0,99.99'],
            'month' => ['required', 'string'],
            'cover' => ['image', 'mimes:jpeg,png,jpg'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'content' => ['required', 'string'],
        ]);

        // Create slug
        $slug = str_slug($request->input('title'), '-', 'tr');

        // Edit issue
        $issue = Issue::findOrFail($id);
        $issue->slug = $slug;
        $issue->title = $request->input('title');
        $issue->price = $request->input('price');

        if ($request->file('cover')) {
            $cover = $request->file('cover');
            $cover_filename = $slug . '.' . $cover->getClientOriginalExtension();
            $issue->cover = $cover_filename;
            Storage::disk('public')->put($cover_filename, file_get_contents($cover));
        }

        $issue->month = $request->input('month');
        $issue->content = $request->input('content');
        $issue->language = $request->input('language');
        $issue->save();

        // Redirect Issues page
        Session::flash('class', 'success');
        Session::flash('message', 'Sayı başarıyla güncellendi!');

        return redirect()->route('admin.issues.edit', $id);
    }

}

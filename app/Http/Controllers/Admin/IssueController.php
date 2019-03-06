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
        return view('admin.issues.create', [
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
        // Validation
        $request->validate([
            'price' => ['required', 'between:0,99.99'],
            'issue' => ['required', 'integer'],
            'month' => ['required', 'string'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'cover' => ['required', 'image', 'mimes:jpeg'],
            'pdf' => ['required', 'mimes:pdf'],
            'content' => ['required', 'string'],
        ]);

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
        try {
            $data = $request->all();
            $data['slug'] = $slug;
            $data['title'] = $title;
            Issue::create($data);
        } catch (Exception $e) {
            Session::flash('class', 'error');
            Session::flash('message', 'Bir hata oluştu!: ' . $e->getMessage());
            return redirect()->route('admin.issues.index');
        }

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

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
                'thead' => ['id', 'Başlık', 'Fiyat', 'Ay/Yıl', 'Dil', 'Kapak', 'Düzenle'],
            ]);

        $table = 'issues';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array('db' => 'title', 'dt' => 1),
            array('db' => 'price', 'dt' => 2),
            array('db' => 'month', 'dt' => 3),
            array(
                'db' => 'language',
                'dt' => 4,
                'formatter' => function ($data, $row) {
                    if ($data == 'tr')
                        return '<span class="label label-success">Türkçe (Arka Kapı Dergi)</span>';
                    return '<span class="label label-info">İngilizce (Arka Kapı Magazine)</span>';
                }
            ),
            array(
                'db' => 'cover',
                'dt' => 5,
                'formatter' => function ($data, $row) {
                    return '<a href="' . config('app.url') . '/storage/' . $data . '" target="_blank">' . $data . '</a>';
                }
            ),
            array(
                'db' => 'id',
                'dt' => 6,
                'formatter' => function ($data, $row) {
                    return '<a href="' . route('admin.issues.edit', $data) . '" class="btn btn-sm btn-primary">Düzenle</a>';
                }
            )
        );

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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.datatables', [
            'title' => 'Sayılar',
            'thead' => ['id', 'column 1', 'column 2', 'column 3', 'column 4'],
        ]);
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

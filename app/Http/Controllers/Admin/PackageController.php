<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Datatables;
use App\Issue;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;

class PackageController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('json'))
            return response()->json(
                Datatables::simple($request->all(), 'packages', 'id', $this->packageService->getDatatableColumns())
            );

        return view('admin.datatables', [
            'title' => 'Paketler',
            'thead' => ['id', 'Başlık', 'Dil', 'Fiyat', 'Sayılar', 'Düzenle'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages.create', [
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
            'title' => ['required', 'string'],
            'price' => ['required', 'between:0,99.99'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'issues' => ['required', 'array'],
        ]);

        $data = $request->all();

        // Create slug
        $data['slug'] = str_slug($request->input('title'), '-', 'tr');

        // Create package
        $package = Package::create($data);

        // Return
        Session::flash('class', 'success');
        Session::flash('message', 'Paket başarıyla eklendi!');

        return redirect()->route('admin.packages.edit', $package->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.packages.edit', [
            'package' => Package::findOrFail($id),
            'issues_all_count' => Issue::all('id')->count(),
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
            'title' => ['required', 'string'],
            'price' => ['required', 'between:0,99.99'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
        ]);

        $data = $request->all();
        $data['slug'] = str_slug($request->input('title'), '-', 'tr');
        if (!$request->input('issues'))
            $data['issues'] = [];

        // Update package
        Package::findOrFail($id)->update($data);

        // Return
        Session::flash('class', 'success');
        Session::flash('message', 'Paket başarıyla güncellendi!');

        return redirect()->route('admin.packages.edit', $id);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Datatables;
use App\Issue;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;
use League\Flysystem\FileExistsException;

class IssueController extends AdminController
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
                Datatables::simple($request->all(), 'issues', 'id', $this->issueService->getDatatableColumns())
            );

        return view('admin.datatables', [
            'title' => 'Sayılar',
            'thead' => ['id', 'Başlık', 'Sayı', 'Fiyat', 'Ay/Yıl', 'Dil', 'Kapak', 'Düzenle'],
        ]);
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
            'preamble' => ['required', 'string'],
        ]);

        $data = $this->issueService->store($request);
        Issue::create($data);

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
        $issues = Issue::all();
        $issue = $issues->find($id);
        $users = User::all();
        $bought_users = $users->filter(function ($user) use ($issue) {
            return in_array($issue->issue, $user->{'purchases_' . $issue->language});
        });

        return view('admin.issues.edit', [
            'issue' => $issue,
            'issues_all_count' => $issues->count(),
            'total_users_count' => $bought_users->count(),
            'total_price' => $bought_users->count() * $issue->price
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
            'price' => ['required', 'between:0,99.99'],
            'issue' => ['required', 'integer'],
            'month' => ['required', 'string'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'cover' => ['image', 'mimes:jpeg'],
            'pdf' => ['mimes:pdf'],
            'content' => ['required', 'string'],
            'preamble' => ['required', 'string'],
        ]);

        $issue = Issue::findOrFail($id);

        // Create title
        $title = 'Arka Kapı Dergi Sayı ' . $request->input('issue');
        if ($request->input('language') == 'en')
            $title = 'Arka Kapı Magazine Issue ' . $request->input('issue');

        // Create slug
        $slug = str_slug($title, '-', 'tr');

        try {
            $this->issueService->updateCover($request, $issue, $slug);
            $this->issueService->updatePdf($request, $issue, $slug);
        } catch (FileExistsException $e) {
            Session::flash('class', 'danger');
            Session::flash('message', 'Seçtiğiniz Sayı ve Dile ait bir sayı zaten var! Üzerine yazamazsınız!');
            return $this->edit($id);
        }

        // Edit issue
        $data = $request->all();
        $data['slug'] = $slug;
        $data['title'] = $title;
        $issue->update($data);

        // Redirect Issues page
        Session::flash('class', 'success');
        Session::flash('message', 'Sayı başarıyla güncellendi!');

        return redirect()->route('admin.issues.edit', $id);
    }

}

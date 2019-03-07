<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Datatables;
use App\Issue;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileExistsException;

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
            'preamble' => ['required', 'string'],
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
        } catch (QueryException $e) {
            Session::flash('class', 'danger');
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
        $issues = Issue::all();
        $issue = $issues->find($id);
        $users = User::all();
        $bought_users = $users->filter(function ($user) use ($issue) {
            $purchases = $issue->language == 'tr' ? json_decode($user->purchases_tr, true) : json_decode($user->purchases_en, true);
            return in_array($issue->issue, $purchases);
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

            // Upload new Cover
            if ($request->file('cover')) {
                $cover = $request->file('cover');
                Storage::disk('public')->put($slug . '.jpg', file_get_contents($cover));
                Storage::disk('public')->delete($issue->slug . '.jpg');
            } else if ($issue->slug != $slug) {
                // If changed title and not selected any cover, change cover file name
                Storage::disk('public')->move($issue->slug . '.jpg', $slug . '.jpg');
            }

            // Upload new PDF
            if ($request->file('pdf')) {
                $pdf = $request->file('pdf');
                Storage::disk('local')->put($slug . '.pdf', file_get_contents($pdf));
                Storage::disk('local')->delete($issue->slug . '.pdf');
            } else if ($issue->slug != $slug) {
                // If changed title and not selected any pdf, change pdf file name
                Storage::disk('local')->move($issue->slug . '.pdf', $slug . '.pdf');
            }

        } catch (FileExistsException $e) {
            Session::flash('class', 'danger');
            Session::flash('message', 'Seçtiğiniz Sayı ve Dile ait bir sayı zaten var! Üzerine yazamazsınız!');
            return $this->edit($id);
        }

        // Edit issue
        try {
            $data = $request->all();
            $data['slug'] = $slug;
            $data['title'] = $title;

            $issue->fill($data);
            $issue->save();
        } catch (QueryException $e) {
            Session::flash('class', 'danger');
            Session::flash('message', 'Veritabanına eklenirken bir hata oluştu!: ' . $e->getMessage());
            return redirect()->route('admin.issues.index');
        }

        // Redirect Issues page
        Session::flash('class', 'success');
        Session::flash('message', 'Sayı başarıyla güncellendi!');

        return redirect()->route('admin.issues.edit', $id);
    }

}

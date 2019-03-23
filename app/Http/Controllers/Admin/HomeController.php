<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;

class HomeController extends AdminController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Exception
     */
    public function index()
    {
        $data = $this->homeService->index();

        return view('admin.dashboard', $data);
    }
}

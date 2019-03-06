<?php

namespace App\Http\Controllers\Admin;

use App\User;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class HomeController extends AdminController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $bought_users = $users->filter(function ($user) {
            return $user->total_tl > 0 || $user->total_usd > 0;
        });

        $first_month = new DateTime("2018-03-01");
        $now_month = new DateTime(date('Y-m-d'));
        $diff_month = $first_month->diff($now_month)->m + ($first_month->diff($now_month)->y * 12);

        $months = [];
        $bought_users_graphic = [];
        for ($i = 0; $i <= $diff_month; $i++) {
            $date = date('m/Y', strtotime("-$i month"));
            $months[] = $date;
            $bought_users_graphic[] = $users->filter(function ($user) use ($date) {
                return $date == date('m/Y', strtotime($user->created_at));
            })->count();
        }

        return view('admin.dashboard', [
            'total_users_count' => $users->count(),
            'bought_users_count' => $bought_users->count(),
            'total_tl' => $bought_users->sum('total_tl'),
            'total_usd' => $bought_users->sum('total_usd'),
            'months' => array_reverse($months),
            'bought_users_graphic' => array_reverse($bought_users_graphic)
        ]);
    }
}

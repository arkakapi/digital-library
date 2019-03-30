<?php

namespace App\Services\Admin;

use App\Order;
use App\User;
use DateTime;

class HomeService
{

    /**
     * Return dashboard data.
     *
     * @return array
     * @throws \Exception
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

        $user_register_months = [];
        $bought_users_graphic = [];
        for ($i = 0; $i <= $diff_month; $i++) {
            $date = date('m/Y', strtotime("-$i month"));
            $user_register_months[] = $date;
            $bought_users_graphic[] = $users->filter(function ($user) use ($date) {
                return $date == date('m/Y', strtotime($user->created_at));
            })->count();
        }

        $purchases_tr = [];
        $purchases_en = [];
        $purchases_register_months = [];
        $orders = Order::where('status', 'successful')->orderBy('created_at', 'asc')->get();
        foreach ($orders as $order) {
            $date = date('m/Y', strtotime($order->created_at));
            $purchases_register_months[] = $date;

            if (!isset($purchases_tr[$date]))
                $purchases_tr[$date] = 0;

            if (!isset($purchases_en[$date]))
                $purchases_en[$date] = 0;

            if (isset(${'purchases_' . $order->language}[$date]))
                ${'purchases_' . $order->language}[$date] += $order->total;

        }

        return [
            'total_users_count' => $users->count(),
            'bought_users_count' => $bought_users->count(),
            'total_tl' => $bought_users->sum('total_tl'),
            'total_usd' => $bought_users->sum('total_usd'),
            'user_register_months' => array_reverse($user_register_months),
            'bought_users_graphic' => array_reverse($bought_users_graphic),
            'purchases_register_months' => array_unique($purchases_register_months),
            'purchases_tr' => $purchases_tr,
            'purchases_en' => $purchases_en
        ];
    }

}

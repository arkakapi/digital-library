<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'omer citak 1',
                'email' => 'mail@omercitak.com',
                'email_verified_at' => '2019-03-07 00:00:00',
                'password' => Hash::make('1234'),
                'country_id' => 220,
                'job' => 'Security Researcher',
                'is_banned' => false,
                'is_admin' => true,
                'language' => 'tr',
                'purchases_tr' => json_encode([1, 3, 5, 7, 9]),
                'purchases_en' => json_encode([2, 4, 6, 8, 10]),
                'total_tl' => 21.34,
                'total_usd' => 56.67,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'omer citak 2',
                'email' => 'msn@omercitak.net',
                'email_verified_at' => '2019-03-07 00:00:00',
                'password' => Hash::make('1234'),
                'country_id' => 221,
                'job' => 'Software Developer',
                'is_banned' => false,
                'is_admin' => false,
                'language' => 'tr',
                'purchases_tr' => json_encode([]),
                'purchases_en' => json_encode([]),
                'total_tl' => 0,
                'total_usd' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        \App\User::insert($users);
    }
}

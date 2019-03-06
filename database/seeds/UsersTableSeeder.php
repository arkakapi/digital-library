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
                'role' => 'admin',
                'language' => 'tr',
            ],
            [
                'name' => 'omer citak 2',
                'email' => 'msn@omercitak.net',
                'email_verified_at' => '2019-03-07 00:00:00',
                'password' => Hash::make('1234'),
                'country_id' => 221,
                'job' => 'Software Developer',
                'role' => 'subscriber',
                'language' => 'tr',
            ]
        ];

        DB::table('users')->insert($users);
    }
}

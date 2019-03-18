<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'slug' => 'arka-kapi-dergi-2018',
                'title' => 'Arka Kapı Dergi 2018',
                'language' => 'tr',
                'price' => 49.90,
                'issues' => json_encode([1, 2, 3, 4, 5, 6])
            ],
            [
                'slug' => 'arka-kapi-dergi-2019',
                'title' => 'Arka Kapı Dergi 2019',
                'language' => 'tr',
                'price' => 49.90,
                'issues' => json_encode([7, 8, 9, 10, 11, 12])
            ],
            [
                'slug' => 'arka-kapi-magazine-2018',
                'title' => 'Arka Kapı Magazine 2018',
                'language' => 'en',
                'price' => 49.90,
                'issues' => json_encode([1, 2])
            ],
            [
                'slug' => 'arka-kapi-magazine-2019',
                'title' => 'Arka Kapı Magazine 2019',
                'language' => 'en',
                'price' => 49.90,
                'issues' => json_encode([3, 4, 5, 6, 7, 8])
            ]
        ];

        \App\Package::insert($packages);

    }
}

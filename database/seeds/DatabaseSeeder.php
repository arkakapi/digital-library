<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(IssuesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
    }
}

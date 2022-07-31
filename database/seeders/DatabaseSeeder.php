<?php

namespace Database\Seeders;

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
        // $this->call(CountrySeeder::class);
        // $this->call(StateSeeder::class);
        // $this->call(CitySeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(MediaSeeder::class);
        $this->call(AdminDetailSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(MenuSeeder::class);
    }
}

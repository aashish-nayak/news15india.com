<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuLocation;
use App\Models\MenuNodes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        MenuNodes::truncate();
        Menu::truncate();
        MenuLocation::truncate();
        Schema::enableForeignKeyConstraints();
        $locations = [
            [
                'location' => 'header-menu',
                'created_at' => now()->toDateTimeString(), 
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'location' => 'main-menu',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'location' => 'sidebar-menu',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'location' => 'footer-menu',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'location' => 'mobile-menu',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]
        ];
        MenuLocation::insert($locations);
        $menus = [
            [
                'menu_location_id' => MenuLocation::where('location','header-menu')->first()->id,
                'name' => 'Header Menu',
                'slug' => 'header-menu',
                'status' => 1,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'menu_location_id' => MenuLocation::where('location','main-menu')->first()->id,
                'name' => 'Main Menu',
                'slug' => 'main-menu',
                'status' => 1,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'menu_location_id' => MenuLocation::where('location','sidebar-menu')->first()->id,
                'name' => 'Sidebar',
                'slug' => 'sidebar',
                'status' => 1,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'menu_location_id' => MenuLocation::where('location','footer-menu')->first()->id,
                'name' => 'Footer',
                'slug' => 'footer',
                'status' => 1,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'menu_location_id' => MenuLocation::where('location','mobile-menu')->first()->id,
                'name' => 'Mobile Menu',
                'slug' => 'mobile-menu',
                'status' => 1,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
        ];
        Menu::insert($menus);
    }
}

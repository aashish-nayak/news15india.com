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
        $menu_nodes = [
            array('id' => '1','menu_id' => '2','parent_id' => '0','reference_id' => '1','reference_type' => 'App\Models\Category','title' => 'राजस्थान','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '1','has_child' => '1','created_at' => '2022-07-27 06:30:29','updated_at' => '2022-07-27 06:30:29'),
            array('id' => '2','menu_id' => '2','parent_id' => '1','reference_id' => '44','reference_type' => 'App\Models\Category','title' => 'कोटा','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '2','has_child' => '0','created_at' => '2022-07-27 06:30:29','updated_at' => '2022-07-27 06:30:29'),
            array('id' => '3','menu_id' => '2','parent_id' => '1','reference_id' => '42','reference_type' => 'App\Models\Category','title' => 'जोधपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '3','has_child' => '0','created_at' => '2022-07-27 06:30:29','updated_at' => '2022-07-27 06:30:29'),
            array('id' => '4','menu_id' => '2','parent_id' => '1','reference_id' => '40','reference_type' => 'App\Models\Category','title' => 'झालावाड़','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '4','has_child' => '0','created_at' => '2022-07-27 06:30:30','updated_at' => '2022-07-27 06:30:30'),
            array('id' => '5','menu_id' => '2','parent_id' => '1','reference_id' => '49','reference_type' => 'App\Models\Category','title' => 'सवाई माधोपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '5','has_child' => '0','created_at' => '2022-07-27 06:30:30','updated_at' => '2022-07-27 06:30:30'),
            array('id' => '6','menu_id' => '2','parent_id' => '1','reference_id' => '52','reference_type' => 'App\Models\Category','title' => 'श्रीगंगानगर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '6','has_child' => '0','created_at' => '2022-07-27 06:30:30','updated_at' => '2022-07-27 06:30:30'),
            array('id' => '7','menu_id' => '2','parent_id' => '1','reference_id' => '53','reference_type' => 'App\Models\Category','title' => 'टोंक','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '7','has_child' => '0','created_at' => '2022-07-27 06:30:30','updated_at' => '2022-07-27 06:30:30'),
            array('id' => '8','menu_id' => '2','parent_id' => '1','reference_id' => '37','reference_type' => 'App\Models\Category','title' => 'जयपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '8','has_child' => '0','created_at' => '2022-07-27 06:30:30','updated_at' => '2022-07-27 06:30:30'),
            array('id' => '9','menu_id' => '2','parent_id' => '0','reference_id' => '12','reference_type' => 'App\Models\Category','title' => 'गैजेट','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '11','has_child' => '1','created_at' => '2022-07-27 06:32:54','updated_at' => '2022-07-27 06:32:54'),
            array('id' => '10','menu_id' => '2','parent_id' => '0','reference_id' => '2','reference_type' => 'App\Models\Category','title' => 'राष्ट्रीय','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '9','has_child' => '0','created_at' => '2022-07-27 06:32:54','updated_at' => '2022-07-27 06:32:54'),
            array('id' => '11','menu_id' => '2','parent_id' => '0','reference_id' => '3','reference_type' => 'App\Models\Category','title' => 'अंतरराष्ट्रीय','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '10','has_child' => '0','created_at' => '2022-07-27 06:32:54','updated_at' => '2022-07-27 06:32:54'),
            array('id' => '12','menu_id' => '2','parent_id' => '9','reference_id' => '58','reference_type' => 'App\Models\Category','title' => 'टेक्नोलॉजी','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '12','has_child' => '0','created_at' => '2022-07-27 06:32:54','updated_at' => '2022-07-27 06:32:54'),
            array('id' => '13','menu_id' => '2','parent_id' => '9','reference_id' => '57','reference_type' => 'App\Models\Category','title' => 'टेब/कंप्यूटर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '13','has_child' => '0','created_at' => '2022-07-27 06:32:54','updated_at' => '2022-07-27 06:32:54'),
            array('id' => '14','menu_id' => '2','parent_id' => '9','reference_id' => '56','reference_type' => 'App\Models\Category','title' => 'मोबाइल','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '14','has_child' => '0','created_at' => '2022-07-27 06:32:54','updated_at' => '2022-07-27 06:32:54'),
            array('id' => '15','menu_id' => '2','parent_id' => '9','reference_id' => '55','reference_type' => 'App\Models\Category','title' => 'ऑटोमोबाइल','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '15','has_child' => '0','created_at' => '2022-07-27 06:32:54','updated_at' => '2022-07-27 06:32:54'),
            array('id' => '16','menu_id' => '2','parent_id' => '0','reference_id' => '7','reference_type' => 'App\Models\Category','title' => 'मनोरंजन','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '16','has_child' => '0','created_at' => '2022-07-27 06:38:00','updated_at' => '2022-07-27 06:38:00'),
            array('id' => '17','menu_id' => '2','parent_id' => '0','reference_id' => '8','reference_type' => 'App\Models\Category','title' => 'विडियो','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '17','has_child' => '0','created_at' => '2022-07-27 06:38:00','updated_at' => '2022-07-27 06:38:00'),
            array('id' => '18','menu_id' => '2','parent_id' => '0','reference_id' => '9','reference_type' => 'App\Models\Category','title' => 'बिजनेस','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '18','has_child' => '0','created_at' => '2022-07-27 06:38:00','updated_at' => '2022-07-27 06:38:00'),
            array('id' => '19','menu_id' => '3','parent_id' => '0','reference_id' => '1','reference_type' => 'App\Models\Category','title' => 'राजस्थान','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '13','has_child' => '1','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '20','menu_id' => '3','parent_id' => '19','reference_id' => '42','reference_type' => 'App\Models\Category','title' => 'जोधपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '2','has_child' => '0','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '21','menu_id' => '3','parent_id' => '19','reference_id' => '41','reference_type' => 'App\Models\Category','title' => 'झुंझुनू','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '3','has_child' => '0','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '22','menu_id' => '3','parent_id' => '19','reference_id' => '49','reference_type' => 'App\Models\Category','title' => 'सवाई माधोपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '4','has_child' => '0','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '23','menu_id' => '3','parent_id' => '19','reference_id' => '50','reference_type' => 'App\Models\Category','title' => 'सीकर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '5','has_child' => '0','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '24','menu_id' => '3','parent_id' => '19','reference_id' => '52','reference_type' => 'App\Models\Category','title' => 'श्रीगंगानगर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '6','has_child' => '0','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '25','menu_id' => '3','parent_id' => '19','reference_id' => '39','reference_type' => 'App\Models\Category','title' => 'जालौर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '7','has_child' => '0','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '26','menu_id' => '3','parent_id' => '19','reference_id' => '38','reference_type' => 'App\Models\Category','title' => 'जैसलमेर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '8','has_child' => '0','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '27','menu_id' => '3','parent_id' => '19','reference_id' => '37','reference_type' => 'App\Models\Category','title' => 'जयपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '9','has_child' => '0','created_at' => '2022-07-27 06:41:52','updated_at' => '2022-07-27 06:41:52'),
            array('id' => '28','menu_id' => '3','parent_id' => '0','reference_id' => '14','reference_type' => 'App\Models\Category','title' => 'मूवी मसाला','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '10','has_child' => '0','created_at' => '2022-07-27 06:43:33','updated_at' => '2022-07-27 06:43:33'),
            array('id' => '29','menu_id' => '3','parent_id' => '0','reference_id' => '15','reference_type' => 'App\Models\Category','title' => 'लाईफ स्टाईल','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '11','has_child' => '0','created_at' => '2022-07-27 06:43:33','updated_at' => '2022-07-27 06:43:33'),
            array('id' => '30','menu_id' => '3','parent_id' => '0','reference_id' => '18','reference_type' => 'App\Models\Category','title' => 'करियर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '12','has_child' => '0','created_at' => '2022-07-27 06:43:33','updated_at' => '2022-07-27 06:43:33'),
            array('id' => '31','menu_id' => '3','parent_id' => '0','reference_id' => '11','reference_type' => 'App\Models\Category','title' => 'क्राइम','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '1','has_child' => '0','created_at' => '2022-07-27 06:43:33','updated_at' => '2022-07-27 06:43:33'),
            array('id' => '32','menu_id' => '3','parent_id' => '0','reference_id' => '2','reference_type' => 'App\Models\Category','title' => 'राष्ट्रीय','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '14','has_child' => '0','created_at' => '2022-07-27 06:43:33','updated_at' => '2022-07-27 06:43:33'),
            array('id' => '33','menu_id' => '3','parent_id' => '0','reference_id' => '3','reference_type' => 'App\Models\Category','title' => 'अंतरराष्ट्रीय','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '15','has_child' => '0','created_at' => '2022-07-27 06:43:33','updated_at' => '2022-07-27 06:43:33'),
            array('id' => '34','menu_id' => '3','parent_id' => '0','reference_id' => '6','reference_type' => 'App\Models\Category','title' => 'राजनीति','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '18','has_child' => '0','created_at' => '2022-07-27 06:43:33','updated_at' => '2022-07-27 06:43:33'),
            array('id' => '35','menu_id' => '3','parent_id' => '0','reference_id' => '7','reference_type' => 'App\Models\Category','title' => 'मनोरंजन','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '17','has_child' => '0','created_at' => '2022-07-27 06:43:33','updated_at' => '2022-07-27 06:43:33'),
            array('id' => '36','menu_id' => '3','parent_id' => '0','reference_id' => '12','reference_type' => 'App\Models\Category','title' => 'गैजेट','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '16','has_child' => '1','created_at' => '2022-07-27 06:43:52','updated_at' => '2022-07-27 06:43:52'),
            array('id' => '37','menu_id' => '3','parent_id' => '36','reference_id' => '58','reference_type' => 'App\Models\Category','title' => 'टेक्नोलॉजी','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '19','has_child' => '0','created_at' => '2022-07-27 06:43:52','updated_at' => '2022-07-27 06:43:52'),
            array('id' => '38','menu_id' => '3','parent_id' => '36','reference_id' => '57','reference_type' => 'App\Models\Category','title' => 'टेब/कंप्यूटर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '20','has_child' => '0','created_at' => '2022-07-27 06:43:52','updated_at' => '2022-07-27 06:43:52'),
            array('id' => '39','menu_id' => '3','parent_id' => '36','reference_id' => '56','reference_type' => 'App\Models\Category','title' => 'मोबाइल','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '21','has_child' => '0','created_at' => '2022-07-27 06:43:52','updated_at' => '2022-07-27 06:43:52'),
            array('id' => '40','menu_id' => '3','parent_id' => '36','reference_id' => '55','reference_type' => 'App\Models\Category','title' => 'ऑटोमोबाइल','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '22','has_child' => '0','created_at' => '2022-07-27 06:43:52','updated_at' => '2022-07-27 06:43:52'),
            array('id' => '41','menu_id' => '5','parent_id' => '0','reference_id' => '1','reference_type' => 'App\Models\Category','title' => 'राजस्थान','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '1','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '42','menu_id' => '5','parent_id' => '0','reference_id' => '13','reference_type' => 'App\Models\Category','title' => 'सोशल मीडिया','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '2','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '43','menu_id' => '5','parent_id' => '0','reference_id' => '14','reference_type' => 'App\Models\Category','title' => 'मूवी मसाला','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '3','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '44','menu_id' => '5','parent_id' => '0','reference_id' => '15','reference_type' => 'App\Models\Category','title' => 'लाईफ स्टाईल','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '4','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '45','menu_id' => '5','parent_id' => '0','reference_id' => '16','reference_type' => 'App\Models\Category','title' => 'स्त्री','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '5','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '46','menu_id' => '5','parent_id' => '0','reference_id' => '17','reference_type' => 'App\Models\Category','title' => 'धर्म','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '6','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '47','menu_id' => '5','parent_id' => '0','reference_id' => '18','reference_type' => 'App\Models\Category','title' => 'करियर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '7','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '48','menu_id' => '5','parent_id' => '0','reference_id' => '19','reference_type' => 'App\Models\Category','title' => 'नॉलेज न्यूज़','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '8','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '49','menu_id' => '5','parent_id' => '0','reference_id' => '20','reference_type' => 'App\Models\Category','title' => 'अन्य ख़बरे','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '9','has_child' => '0','created_at' => '2022-07-27 06:48:31','updated_at' => '2022-07-27 06:48:31'),
            array('id' => '50','menu_id' => '4','parent_id' => '0','reference_id' => '1','reference_type' => 'App\Models\Category','title' => 'राजस्थान','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '1','has_child' => '1','created_at' => '2022-07-27 06:58:10','updated_at' => '2022-07-27 06:58:10'),
            array('id' => '51','menu_id' => '4','parent_id' => '0','reference_id' => '13','reference_type' => 'App\Models\Category','title' => 'सोशल मीडिया','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '2','has_child' => '1','created_at' => '2022-07-27 06:58:10','updated_at' => '2022-07-27 06:58:10'),
            array('id' => '52','menu_id' => '4','parent_id' => '0','reference_id' => '14','reference_type' => 'App\Models\Category','title' => 'मूवी मसाला','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '3','has_child' => '1','created_at' => '2022-07-27 06:58:10','updated_at' => '2022-07-27 06:58:10'),
            array('id' => '53','menu_id' => '4','parent_id' => '0','reference_id' => '15','reference_type' => 'App\Models\Category','title' => 'लाईफ स्टाईल','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '4','has_child' => '1','created_at' => '2022-07-27 06:58:10','updated_at' => '2022-07-27 06:58:10'),
            array('id' => '54','menu_id' => '4','parent_id' => '0','reference_id' => '18','reference_type' => 'App\Models\Category','title' => 'करियर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '5','has_child' => '1','created_at' => '2022-07-27 06:58:10','updated_at' => '2022-07-27 06:58:10'),
            array('id' => '55','menu_id' => '4','parent_id' => '50','reference_id' => '49','reference_type' => 'App\Models\Category','title' => 'सवाई माधोपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '6','has_child' => '0','created_at' => '2022-07-27 06:58:48','updated_at' => '2022-07-27 06:58:48'),
            array('id' => '56','menu_id' => '4','parent_id' => '50','reference_id' => '51','reference_type' => 'App\Models\Category','title' => 'सिरोही','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '7','has_child' => '0','created_at' => '2022-07-27 06:58:48','updated_at' => '2022-07-27 06:58:48'),
            array('id' => '57','menu_id' => '4','parent_id' => '50','reference_id' => '52','reference_type' => 'App\Models\Category','title' => 'श्रीगंगानगर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '8','has_child' => '0','created_at' => '2022-07-27 06:58:48','updated_at' => '2022-07-27 06:58:48'),
            array('id' => '58','menu_id' => '4','parent_id' => '50','reference_id' => '53','reference_type' => 'App\Models\Category','title' => 'टोंक','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '9','has_child' => '0','created_at' => '2022-07-27 06:58:48','updated_at' => '2022-07-27 06:58:48'),
            array('id' => '59','menu_id' => '4','parent_id' => '50','reference_id' => '54','reference_type' => 'App\Models\Category','title' => 'उदयपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '10','has_child' => '0','created_at' => '2022-07-27 06:58:48','updated_at' => '2022-07-27 06:58:48'),
            array('id' => '60','menu_id' => '4','parent_id' => '50','reference_id' => '38','reference_type' => 'App\Models\Category','title' => 'जैसलमेर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '11','has_child' => '0','created_at' => '2022-07-27 06:58:48','updated_at' => '2022-07-27 06:58:48'),
            array('id' => '61','menu_id' => '4','parent_id' => '50','reference_id' => '37','reference_type' => 'App\Models\Category','title' => 'जयपुर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '12','has_child' => '0','created_at' => '2022-07-27 06:58:48','updated_at' => '2022-07-27 06:58:48'),
            array('id' => '62','menu_id' => '4','parent_id' => '50','reference_id' => '22','reference_type' => 'App\Models\Category','title' => 'अजमेर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '13','has_child' => '0','created_at' => '2022-07-27 06:58:48','updated_at' => '2022-07-27 06:58:48'),
            array('id' => '63','menu_id' => '4','parent_id' => '51','reference_id' => '86','reference_type' => 'App\Models\Category','title' => 'गूगल न्यूज़','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '14','has_child' => '0','created_at' => '2022-07-27 07:02:59','updated_at' => '2022-07-27 07:02:59'),
            array('id' => '64','menu_id' => '4','parent_id' => '51','reference_id' => '87','reference_type' => 'App\Models\Category','title' => 'फेसबुक न्यूज़','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '15','has_child' => '0','created_at' => '2022-07-27 07:02:59','updated_at' => '2022-07-27 07:02:59'),
            array('id' => '65','menu_id' => '4','parent_id' => '51','reference_id' => '88','reference_type' => 'App\Models\Category','title' => 'ट्विटर न्यूज़','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '16','has_child' => '0','created_at' => '2022-07-27 07:02:59','updated_at' => '2022-07-27 07:02:59'),
            array('id' => '66','menu_id' => '4','parent_id' => '51','reference_id' => '89','reference_type' => 'App\Models\Category','title' => 'यूट्यूब न्यूज़','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '17','has_child' => '0','created_at' => '2022-07-27 07:02:59','updated_at' => '2022-07-27 07:02:59'),
            array('id' => '67','menu_id' => '4','parent_id' => '52','reference_id' => '61','reference_type' => 'App\Models\Category','title' => 'बर्थ स्पेशल','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '18','has_child' => '0','created_at' => '2022-07-27 07:04:09','updated_at' => '2022-07-27 07:04:09'),
            array('id' => '68','menu_id' => '4','parent_id' => '52','reference_id' => '60','reference_type' => 'App\Models\Category','title' => 'फिल्मी ख़बरे','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '19','has_child' => '0','created_at' => '2022-07-27 07:04:09','updated_at' => '2022-07-27 07:04:09'),
            array('id' => '69','menu_id' => '4','parent_id' => '52','reference_id' => '59','reference_type' => 'App\Models\Category','title' => 'ट्रेलर','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '20','has_child' => '0','created_at' => '2022-07-27 07:04:09','updated_at' => '2022-07-27 07:04:09'),
            array('id' => '70','menu_id' => '4','parent_id' => '52','reference_id' => '62','reference_type' => 'App\Models\Category','title' => 'वायरल विडियो','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '21','has_child' => '0','created_at' => '2022-07-27 07:04:09','updated_at' => '2022-07-27 07:04:09'),
            array('id' => '71','menu_id' => '4','parent_id' => '53','reference_id' => '67','reference_type' => 'App\Models\Category','title' => 'रिलेशनशिप','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '22','has_child' => '0','created_at' => '2022-07-27 07:05:52','updated_at' => '2022-07-27 07:05:52'),
            array('id' => '72','menu_id' => '4','parent_id' => '53','reference_id' => '65','reference_type' => 'App\Models\Category','title' => 'फिटनेस','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '23','has_child' => '0','created_at' => '2022-07-27 07:05:52','updated_at' => '2022-07-27 07:05:52'),
            array('id' => '73','menu_id' => '4','parent_id' => '53','reference_id' => '64','reference_type' => 'App\Models\Category','title' => 'पैसो की बात','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '24','has_child' => '0','created_at' => '2022-07-27 07:05:52','updated_at' => '2022-07-27 07:05:52'),
            array('id' => '74','menu_id' => '4','parent_id' => '53','reference_id' => '63','reference_type' => 'App\Models\Category','title' => 'पर्यटन','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '25','has_child' => '0','created_at' => '2022-07-27 07:05:52','updated_at' => '2022-07-27 07:05:52'),
            array('id' => '75','menu_id' => '4','parent_id' => '53','reference_id' => '66','reference_type' => 'App\Models\Category','title' => 'राईट डाईट','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '26','has_child' => '0','created_at' => '2022-07-27 07:05:52','updated_at' => '2022-07-27 07:05:52'),
            array('id' => '76','menu_id' => '4','parent_id' => '54','reference_id' => '76','reference_type' => 'App\Models\Category','title' => 'करंट अफेयर्स','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '27','has_child' => '0','created_at' => '2022-07-27 07:07:18','updated_at' => '2022-07-27 07:07:18'),
            array('id' => '77','menu_id' => '4','parent_id' => '54','reference_id' => '77','reference_type' => 'App\Models\Category','title' => 'जॉब','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '28','has_child' => '0','created_at' => '2022-07-27 07:07:18','updated_at' => '2022-07-27 07:07:18'),
            array('id' => '78','menu_id' => '4','parent_id' => '54','reference_id' => '78','reference_type' => 'App\Models\Category','title' => 'रिजल्ट','url' => 'category-news','icon' => NULL,'css' => NULL,'target' => '_self','position' => '29','has_child' => '0','created_at' => '2022-07-27 07:07:18','updated_at' => '2022-07-27 07:07:18')
        ];
        $nodes = array_chunk($menu_nodes,10);
        foreach ($nodes as $node) {
            MenuNodes::insert($node);
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Models\AdvertPlacement;
use Illuminate\Console\Command;

class AdvertPlaces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertplaces:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Dynamic Advertisment Places for Show Ads on Frontend';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $advert_placements = array(
            array('id' => '1', 'group_name' => 'Home', 'name' => 'Header', 'slug' => 'home-header-1200x150', 'price' => '12.00', 'width' => '1200', 'height' => '150', 'status' => '1', 'created_at' => '2022-10-19 22:54:30', 'updated_at' => '2022-10-19 22:58:54'),
            array('id' => '2', 'group_name' => 'Home', 'name' => 'Section 1 Sidebar', 'slug' => 'home-section-1-sidebar-300x350', 'price' => '12.00', 'width' => '300', 'height' => '350', 'status' => '1', 'created_at' => '2022-10-19 22:56:16', 'updated_at' => '2022-10-19 23:01:12'),
            array('id' => '3', 'group_name' => 'Home', 'name' => 'Section 1 Bottom', 'slug' => 'home-section-1-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-19 22:57:58', 'updated_at' => '2022-10-19 22:57:58'),
            array('id' => '4', 'group_name' => 'Home', 'name' => 'Section 3 Bottom', 'slug' => 'home-section-3-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-19 23:00:01', 'updated_at' => '2022-10-19 23:00:01'),
            array('id' => '5', 'group_name' => 'Home', 'name' => 'Section 3 Sidebar Slider', 'slug' => 'home-section-3-sidebar-slider-300x350', 'price' => '12.00', 'width' => '300', 'height' => '350', 'status' => '1', 'created_at' => '2022-10-19 23:02:12', 'updated_at' => '2022-10-19 23:06:27'),
            array('id' => '6', 'group_name' => 'Home', 'name' => 'Section 6 Bottom', 'slug' => 'home-section-6-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-19 23:04:23', 'updated_at' => '2022-10-19 23:04:23'),
            array('id' => '7', 'group_name' => 'Home', 'name' => 'Section 7 Sidebar', 'slug' => 'home-section-7-sidebar-300x350', 'price' => '12.00', 'width' => '300', 'height' => '350', 'status' => '1', 'created_at' => '2022-10-19 23:04:58', 'updated_at' => '2022-10-19 23:04:58'),
            array('id' => '8', 'group_name' => 'Home', 'name' => 'Section 8 Bottom', 'slug' => 'home-section-8-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-19 23:05:43', 'updated_at' => '2022-10-19 23:05:43'),
            array('id' => '9', 'group_name' => 'Category', 'name' => 'Breadcrumb Bottom Header', 'slug' => 'category-breadcrumb-bottom-header-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 22:24:52', 'updated_at' => '2022-10-21 22:24:52'),
            array('id' => '10', 'group_name' => 'Category', 'name' => 'Sidebar', 'slug' => 'category-sidebar-350x300', 'price' => '12.00', 'width' => '350', 'height' => '300', 'status' => '1', 'created_at' => '2022-10-21 22:26:09', 'updated_at' => '2022-10-21 22:26:09'),
            array('id' => '11', 'group_name' => 'Category', 'name' => 'Pagination Bottom', 'slug' => 'category-pagination-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 22:27:01', 'updated_at' => '2022-10-21 22:27:01'),
            array('id' => '12', 'group_name' => 'Tag', 'name' => 'Breadcrumb Bottom Header', 'slug' => 'tag-breadcrumb-bottom-header-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 22:57:38', 'updated_at' => '2022-10-21 22:57:38'),
            array('id' => '13', 'group_name' => 'Tag', 'name' => 'Sidebar', 'slug' => 'tag-sidebar-350x300', 'price' => '12.00', 'width' => '350', 'height' => '300', 'status' => '1', 'created_at' => '2022-10-21 22:58:52', 'updated_at' => '2022-10-21 22:58:52'),
            array('id' => '14', 'group_name' => 'Tag', 'name' => 'Pagination Bottom', 'slug' => 'tag-pagination-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 22:59:30', 'updated_at' => '2022-10-21 22:59:30'),
            array('id' => '15', 'group_name' => 'News', 'name' => 'Header', 'slug' => 'news-header-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 23:04:43', 'updated_at' => '2022-10-21 23:04:43'),
            array('id' => '16', 'group_name' => 'News', 'name' => 'Image Bottom', 'slug' => 'news-image-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 23:07:14', 'updated_at' => '2022-10-21 23:07:14'),
            array('id' => '17', 'group_name' => 'News', 'name' => 'Content Bottom', 'slug' => 'news-content-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 23:08:02', 'updated_at' => '2022-10-21 23:08:02'),
            array('id' => '18', 'group_name' => 'News', 'name' => 'Sidebar', 'slug' => 'news-sidebar-350x300', 'price' => '12.00', 'width' => '350', 'height' => '300', 'status' => '1', 'created_at' => '2022-10-21 23:09:42', 'updated_at' => '2022-10-21 23:10:00'),
            array('id' => '19', 'group_name' => 'Author', 'name' => 'Header', 'slug' => 'author-header-1250x150', 'price' => '12.00', 'width' => '1250', 'height' => '150', 'status' => '1', 'created_at' => '2022-10-21 23:14:06', 'updated_at' => '2022-10-21 23:14:06'),
            array('id' => '20', 'group_name' => 'Author', 'name' => 'Sidebar', 'slug' => 'author-sidebar-350x300', 'price' => '12.00', 'width' => '350', 'height' => '300', 'status' => '1', 'created_at' => '2022-10-21 23:16:26', 'updated_at' => '2022-10-21 23:16:26'),
            array('id' => '21', 'group_name' => 'Author', 'name' => 'Detail Bottom', 'slug' => 'author-detail-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 23:17:08', 'updated_at' => '2022-10-21 23:17:08'),
            array('id' => '22', 'group_name' => 'Author', 'name' => 'Category Bottom', 'slug' => 'author-category-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 23:18:08', 'updated_at' => '2022-10-21 23:18:08'),
            array('id' => '23', 'group_name' => 'Author', 'name' => 'Pagination Bottom', 'slug' => 'author-pagination-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 23:19:08', 'updated_at' => '2022-10-21 23:19:08'),
            array('id' => '24', 'group_name' => 'Polls', 'name' => 'Header', 'slug' => 'polls-header-1250x150', 'price' => '12.00', 'width' => '1250', 'height' => '150', 'status' => '1', 'created_at' => '2022-10-21 23:25:44', 'updated_at' => '2022-10-21 23:25:44'),
            array('id' => '25', 'group_name' => 'Polls', 'name' => 'Left Sidebar', 'slug' => 'polls-left-sidebar-350x300', 'price' => '12.00', 'width' => '350', 'height' => '300', 'status' => '1', 'created_at' => '2022-10-21 23:27:37', 'updated_at' => '2022-10-21 23:27:37'),
            array('id' => '26', 'group_name' => 'Polls', 'name' => 'Right Sidebar', 'slug' => 'polls-right-sidebar-350x300', 'price' => '12.00', 'width' => '350', 'height' => '300', 'status' => '1', 'created_at' => '2022-10-21 23:28:26', 'updated_at' => '2022-10-21 23:28:26'),
            array('id' => '27', 'group_name' => 'Polls', 'name' => 'Bottom Each', 'slug' => 'polls-bottom-each-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 23:30:25', 'updated_at' => '2022-10-21 23:30:25'),
            array('id' => '28', 'group_name' => 'Profile', 'name' => 'Header', 'slug' => 'profile-header-1250x150', 'price' => '12.00', 'width' => '1250', 'height' => '150', 'status' => '1', 'created_at' => '2022-10-21 23:35:38', 'updated_at' => '2022-10-21 23:35:38'),
            array('id' => '29', 'group_name' => 'Profile', 'name' => 'Sidebar', 'slug' => 'profile-sidebar-350x300', 'price' => '12.00', 'width' => '350', 'height' => '300', 'status' => '1', 'created_at' => '2022-10-21 23:36:30', 'updated_at' => '2022-10-21 23:36:30'),
            array('id' => '30', 'group_name' => 'Profile', 'name' => 'Bottom', 'slug' => 'profile-bottom-800x100', 'price' => '12.00', 'width' => '800', 'height' => '100', 'status' => '1', 'created_at' => '2022-10-21 23:39:39', 'updated_at' => '2022-10-21 23:39:39')
        );
        echo "Advert Places Syncing...\n";
        foreach ($advert_placements as $key => $value) {
            if(AdvertPlacement::where('slug',$value['slug'])->count() == 0){
                AdvertPlacement::create($value);
            }
        }
        echo "Advert Places Synced !\n";
    }
}

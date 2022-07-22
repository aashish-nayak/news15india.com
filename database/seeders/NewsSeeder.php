<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        News::truncate();
        Schema::enableForeignKeyConstraints();
        News::factory(500)->create()->each(function($query){
            $query->categories()->sync(Category::inRandomOrder()->limit(2)->get()->pluck('id')->toArray());
            $query->tags()->sync(Tag::inRandomOrder()->limit(5)->get()->pluck('id')->toArray());
        });
    }
}

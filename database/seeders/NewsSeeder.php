<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('news_categories')->truncate();
        DB::table('news_tag')->truncate();
        News::truncate();
        Schema::enableForeignKeyConstraints();
        News::factory(5000)->create()->each(function($query){
            $cat = Category::where('parent_id',NULL)->inRandomOrder()->first();
            $cat2 = $cat->children()->inRandomOrder()->first();
            $ids = [$cat->id];
            if(isset($cat2->id))
                $ids[] = $cat2->id;
            $query->categories()->sync($ids);
            $query->tags()->sync(Tag::inRandomOrder()->limit(random_int(1,10))->get()->pluck('id')->toArray());
        });
    }
}

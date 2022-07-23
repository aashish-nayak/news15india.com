<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Media;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = News::class;

    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title'=> $title,
            'slug'=> Str::slug($title),
            'short_description'=> $this->faker->text(100),
            'admin_id'=> Admin::inRandomOrder()->limit(1)->first()->id,
            'content'=> implode(". ",$this->faker->paragraphs(20)),
            'is_published'=> 1,
            'status'=>  1,
            'is_verified'=> 1,
            'page_order'=> $this->faker->randomNumber(5),
            'image'=> Media::inRandomOrder()->limit(1)->first()->id,
            'format'=> 'default',
            'youtube_url'=> NULL,
            'is_featured'=> 0,
            'meta_title'=> $title,
            'meta_keywords'=> Str::slug($title),
            'meta_description'=> $this->faker->text(100),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ];
    }
}

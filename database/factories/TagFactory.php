<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Tag::class;
    
    public function definition()
    {
        $tagname = Str::random(7);
        return [
            'name' => $tagname,
            'slug' => Str::slug($tagname),
            'tag_img' => Media::inRandomOrder()->limit(1)->first()->id,
            'meta_title' => $this->faker->title(),
            'meta_keyword'=> str_replace(" ",",",$this->faker->text),
            'meta_description' => $this->faker->text,
            'status' => 1
        ];
    }
}

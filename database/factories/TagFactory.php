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
        $tagname = $this->faker->domainWord;
        return [
            'name' => $tagname,
            'slug' => Str::slug($tagname),
            'tag_img' => (Media::inRandomOrder()->count() > 0) ? Media::inRandomOrder()->first()->id : NULL,
            'meta_title' => $tagname,
            'meta_keywords'=> str_replace(" ",",",$this->faker->text),
            'meta_description' => $this->faker->text,
            'status' => 1,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ];
    }
}

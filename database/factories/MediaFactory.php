<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Media::class;

    public function definition()
    {
        // \App\Traits\LoremImageTrait::imageSave();
        $filedata = $this->model::imageSave(Str::random(10));
        return [
            'admin_id' => Admin::inRandomOrder()->limit(1)->first()->id,
            'img' => $filedata['filename'],
            'alt' => $this->faker->userName,
            'size' => $filedata['size'],
            'type' => $filedata['type'],
            'dimension' => $filedata['dimension'],
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ];
    }
}

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
        $filedata = $this->model::imageSave(now()->format('Y_m_d_H_i_s')."_".$this->faker->domainName);
        return [
            'admin_id' => Admin::inRandomOrder()->first()->id,
            'filename' => $filedata['filename'],
            'alt' => $this->faker->domainName,
            'size' => $filedata['size'],
            'type' => $filedata['type'],
            'dimension' => $filedata['dimension'],
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ];
    }
}

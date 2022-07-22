<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Response;
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
        $imgs = [
            'bear.jpg','books.jpg','choclate.jpg','forest.jpg','mountain.jpg','road.jpg','train.jpg','videogame.jpg','house.jpg','laptop.jpg','sky.jpg','laptop-2.jpg','traffic.jpg','hangs.jpg','flower.jpg','us.jpg','elevator.jpg',
        ];
        return [
            'img' => $imgs[random_int(0,(count($imgs) - 1))],
            'alt' => $this->faker->userName,
            'size' => $this->faker->randomNumber(5),
            'type' => 'image/jpeg',
            'dimension' => '640x480'
        ];
    }
}

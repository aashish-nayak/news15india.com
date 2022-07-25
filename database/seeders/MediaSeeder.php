<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Media::truncate();
        Schema::enableForeignKeyConstraints();
        Storage::deleteDirectory('public/media');
        Storage::deleteDirectory('public/temp');
        Media::factory(10)->create();
    }
}

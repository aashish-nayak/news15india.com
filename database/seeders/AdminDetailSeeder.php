<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\AdminDetail;
use App\Models\Media;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Str;

class AdminDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        AdminDetail::truncate();
        Schema::enableForeignKeyConstraints();

        $countryId = Country::where('code','IN')->first()->id;
        $stateId = State::where('country_id',$countryId)->inRandomOrder()->first()->id;
        $stateId2 = State::where('country_id',$countryId)->inRandomOrder()->first()->id;
        $stateId3 = State::where('country_id',$countryId)->inRandomOrder()->first()->id;
        $stateId4 = State::where('country_id',$countryId)->inRandomOrder()->first()->id;

        $admin = Admin::find(1);
        AdminDetail::insert([
            'admin_id' => $admin->id,
            'url' => Str::slug($admin->name),
            'about' => Str::random(100),
            'avatar_id' => (Media::query()->count() > 0) ? Media::inRandomOrder()->first()->id : NULL,
            'phone' => Str::random(10),
            'address' => Str::random(50),
            'country_id' => $countryId,
            'state_id' => $stateId,
            'city_id' => City::where('state_id',$stateId)->inRandomOrder()->first()->id,
            'zip' => Str::random(6),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        $admin = Admin::find(2);
        AdminDetail::insert([
            'admin_id' => $admin->id,
            'url' => Str::slug($admin->name),
            'about' => Str::random(100),
            'avatar_id' => (Media::query()->count() > 0) ? Media::inRandomOrder()->first()->id : NULL,
            'phone' => Str::random(10),
            'address' => Str::random(50),
            'country_id' => $countryId,
            'state_id' => $stateId2,
            'city_id' => City::where('state_id',$stateId2)->inRandomOrder()->first()->id,
            'zip' => Str::random(6),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);
        
        $admin = Admin::find(3);
        AdminDetail::insert([
            'admin_id' => $admin->id,
            'url' => Str::slug($admin->name),
            'about' => Str::random(100),
            'avatar_id' => (Media::query()->count() > 0) ? Media::inRandomOrder()->first()->id : NULL,
            'phone' => Str::random(10),
            'address' => Str::random(50),
            'country_id' => $countryId,
            'state_id' => $stateId3,
            'city_id' => City::where('state_id',$stateId3)->inRandomOrder()->first()->id,
            'zip' => Str::random(6),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        $admin = Admin::find(4);
        AdminDetail::insert([
            'admin_id' => $admin->id,
            'url' => Str::slug($admin->name),
            'about' => Str::random(100),
            'avatar_id' => (Media::query()->count() > 0) ? Media::inRandomOrder()->first()->id : NULL,
            'phone' => Str::random(10),
            'address' => Str::random(50),
            'country_id' => $countryId,
            'state_id' => $stateId4,
            'city_id' => City::where('state_id',$stateId4)->inRandomOrder()->first()->id,
            'zip' => Str::random(6),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);
    }
}

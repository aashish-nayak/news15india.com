<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique()->index();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        Setting::insert([
            $this->buildSetting('SITE_NAME','News15India'),
            $this->buildSetting('SITE_URL','https://www.news15india.com'),
            $this->buildSetting('SITE_LOGO',null),
            $this->buildSetting('SITE_DESCRIPTION',null),
            $this->buildSetting('SITE_PHONE','1234567890'),
            $this->buildSetting('SITE_EMAIL','info@news15india.com'),
            $this->buildSetting('SITE_SOCIAL_LINKS',null),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
    
    private function buildSetting(string $key, $value) : array {
        return [
            'key' => $key,
            'value' => $value,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];
    }
}

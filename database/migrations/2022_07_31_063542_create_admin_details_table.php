<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
            $table->string('url')->nullable();
            $table->unsignedBigInteger('avatar_id')->nullable();
            $table->foreign('avatar_id')->references('id')->on('media')->onDelete('set null')->cascadeOnUpdate();
            $table->string('about')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('state_id')->references('id')->on('states')->nullOnDelete();
            $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            $table->string('zip')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('timezone')->nullable();
            $table->string('language')->nullable();
            $table->string('currency')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_details');
    }
}

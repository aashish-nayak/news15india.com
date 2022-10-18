<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->text('booking_id');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('advertiser_name')->nullable();
            $table->string('advertiser_number');
            $table->string('advertiser_email');
            $table->string('billing_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('block')->nullable();
            $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('state_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
            $table->string('pincode')->nullable();
            $table->string('package')->nullable();
            $table->string('ad_type');
            $table->unsignedBigInteger('ad_category')->nullable();
            $table->foreign('ad_category')->references('id')->on('advert_categories')->nullOnDelete();
            $table->string('ad_location')->nullable();
            $table->string('ad_width')->default('100%');
            $table->string('ad_height')->default('auto');
            $table->string('ad_duration')->nullable();
            $table->date('publish_date');
            $table->date('expire_date');
            $table->string('discount')->nullable();
            $table->string('ad_title');
            $table->text('ad_description')->nullable();
            $table->text('ad_image');
            $table->text('ad_redirect')->nullable();
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
        Schema::dropIfExists('adverts');
    }
}

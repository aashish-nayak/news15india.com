<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertPlacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_placements', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->string('name');
            $table->string('slug');
            $table->decimal('price')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('advert_placements');
    }
}

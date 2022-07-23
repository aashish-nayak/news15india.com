<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name',100);
            $table->string('slug',100)->unique();
            $table->integer('cat_order');
            $table->unsignedBigInteger('cat_img')->nullable();
            $table->foreign('cat_img')->references('id')->on('media')->nullOnDelete();
            $table->text('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_desc')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

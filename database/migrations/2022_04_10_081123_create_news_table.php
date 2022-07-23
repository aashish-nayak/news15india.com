<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('short_description');
            $table->text('content')->nullable();
            $table->unsignedBigInteger('image')->nullable();
            $table->foreign('image')->references('id')->on('media')->nullOnDelete();
            $table->integer('page_order')->default(0);
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
            $table->boolean('is_published')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->enum('format',['default','video'])->default('default');
            $table->boolean('is_featured')->default(false);
            $table->string('youtube_url')->nullable();
            $table->boolean('status')->default(1);
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
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
        Schema::dropIfExists('news');
    }
}

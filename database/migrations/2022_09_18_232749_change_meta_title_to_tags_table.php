<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMetaTitleToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropColumns('tags',['meta_title','meta_keywords','meta_description']);
        Schema::table('tags', function (Blueprint $table) {
            $table->longText('meta_title')->nullable()->after('status');
            $table->longText('meta_keywords')->nullable()->after('meta_title');
            $table->longText('meta_description')->nullable()->after('meta_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('tags',['meta_title','meta_keywords','meta_description']);
        Schema::table('tags', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('status');
            $table->string('meta_keywords')->nullable()->after('meta_title');
            $table->string('meta_description')->nullable()->after('meta_keywords');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatImgToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'cat_img')){
                Schema::table('categories', function (Blueprint $table) {
                    $table->dropColumn('cat_img');
                });
            }
            Schema::table('categories', function (Blueprint $table) {
                $table->unsignedBigInteger('cat_img')->nullable()->after('status');
                $table->foreign('cat_img')->references('id')->on('media')->nullOnDelete();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('cat_img');
        });
    }
}

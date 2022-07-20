<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLocationToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('categories', 'location')){
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('location');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn('categories', 'location')){
            Schema::table('categories', function (Blueprint $table) {
                $table->string('location')->nullable();
            });
        }
    }
}

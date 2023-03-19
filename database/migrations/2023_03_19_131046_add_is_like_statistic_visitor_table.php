<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statistic_visitor', function (Blueprint $table) {
            $table->boolean('is_like')->default(0)->after('visitor_id');
            $table->boolean('is_dislike')->default(0)->after('is_like');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statistic_visitor', function (Blueprint $table) {
            $table->dropColumn('is_like');
            $table->dropColumn('is_dislike');
        });
    }
};

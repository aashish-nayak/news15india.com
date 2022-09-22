<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIpToReportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reporters', function (Blueprint $table) {
            $table->text('user_ip')->after('user_id')->nullable();
            if(Schema::hasColumn('reporters','reporter_status')){
                $table->dropColumn('reporter_status');
                $table->enum('app_status',['pending','processing','approved','rejected'])->default('pending')->after('office_zip');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reporters', function (Blueprint $table) {
            $table->dropColumn('user_ip');
            if(Schema::hasColumn('reporters','app_status')){
                $table->dropColumn('app_status');
                $table->enum('reporter_status',['pending','process','approved'])->default('pending')->after('office_zip');
            }
        });
    }
}

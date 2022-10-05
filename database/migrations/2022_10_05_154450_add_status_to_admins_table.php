<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('password');
            $table->string('id_card')->nullable()->after('status');
            $table->boolean('is_card')->default(0)->after('id_card');
            $table->boolean('letter')->default(0)->after('is_card');
            $table->boolean('pro')->default(0)->after('letter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('id_card');
            $table->dropColumn('is_card');
            $table->dropColumn('letter');
            $table->dropColumn('pro');
        });
    }
}

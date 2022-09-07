<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferenceToVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('votes', function (Blueprint $table) {
            if (Schema::hasColumn('votes', 'user_id')) {
                $table->dropColumn('user_id');
            }
            $table->integer('user_id')->after('id');
            $table->string('reference_type')->after('user_id')->default('App\\\Models\\\User');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropColumn('reference_type');
            $table->dropColumn('user_id');
        });
    }
}
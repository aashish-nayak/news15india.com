<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToAdminDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('admin_details', function (Blueprint $table) {
            if(Schema::hasColumn('admin_details','avatar_id')){
                $table->dropConstrainedForeignId('avatar_id');
                $table->string('avatar')->nullable()->after('url');
            }
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
        Schema::disableForeignKeyConstraints();
        Schema::table('admin_details', function (Blueprint $table) {
            if(Schema::hasColumn('admin_details','avatar')){
                $table->dropColumn('avatar');
                $table->unsignedBigInteger('avatar_id')->nullable()->after('url');
                $table->foreign('avatar_id')->references('id')->on('media')->onDelete('set null')->cascadeOnUpdate();
            }
        });
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        if (Schema::hasTable('visitor_registries')) {
            Schema::rename('visitor_registries', 'visitors');
        }
        Schema::dropIfExists('statistic_visitor_registry');
        Schema::enableForeignKeyConstraints();
        Schema::create('statistic_visitor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statistic_id')->constrained()->cascadeOnDelete();
            $table->foreignId('visitor_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        if (Schema::hasTable('visitors')) {
            Schema::rename('visitors', 'visitor_registries');
        }
        Schema::dropIfExists('statistic_visitor');
        Schema::create('statistic_visitor_registry', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statistic_id')->constrained()->cascadeOnDelete();
            $table->foreignId('visitor_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }
}

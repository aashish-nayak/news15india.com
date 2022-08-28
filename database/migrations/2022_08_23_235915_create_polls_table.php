<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->integer('maxCheck')->default(1);
            $table->boolean('canVisitorsVote')->default(0);
            $table->boolean('canVoterSeeResult')->default(0);
            $table->string('organized_by')->nullable();
            $table->string('image')->nullable();
            $table->integer('views')->default(0);
            $table->timestamp('isClosed')->nullable();
            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();
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
        Schema::dropIfExists('polls');
    }
}

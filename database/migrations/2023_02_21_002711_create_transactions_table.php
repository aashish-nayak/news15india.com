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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id')->nullable();
            $table->string('reference_type')->nullable();
            $table->string('reason')->nullable();
            $table->date('date')->default(now()->toDateString());
            $table->enum('type',['debit','credit'])->default('credit');
            $table->foreignId('bank_account_id')->nullable()->constrained()->nullOnDelete();
            $table->float('amount');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('transactions');
    }
};

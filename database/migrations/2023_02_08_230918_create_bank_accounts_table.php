<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('holder_name');
            $table->string('bank_name');
            $table->string('account_number');
            $table->float('opening_balance', 15, 2)->default('0.00');
            $table->string('contact_number');
            $table->text('bank_address')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('admins')->nullOnDelete();
            $table->timestamps();
        });
        DB::table('bank_accounts')->insert([
            'holder_name' => 'CASH',
            'bank_name' => 'CASH',
            'account_number' => '000000000000',
            'opening_balance' => 0.00,
            'contact_number' => setting('site_phone'),
            'bank_address' => setting('site_address'),
            'created_by' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
};

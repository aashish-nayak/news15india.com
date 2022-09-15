<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('admin_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('whatsapp_number');
            $table->string('emergency_number');
            $table->date('dob');
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('marital_status')->default(0);
            $table->string('blood_group')->nullable();
            $table->text('home_address')->nullable();
            $table->text('tehsil_block')->nullable();
            $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('state_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('zip')->nullable();
            $table->string('police_station')->nullable();
            $table->string('aadhar_number');
            $table->string('aadhar_image');
            $table->string('pan_number');
            $table->string('pan_image');
            $table->string('voter_driving_image')->nullable();
            $table->string('10th_image')->nullable();
            $table->string('12th_image')->nullable();
            $table->string('graduation_image')->nullable();
            $table->string('diploma_image')->nullable();
            $table->string('police_verification')->nullable();
            $table->string('other_certificate')->nullable();
            $table->string('other_document')->nullable();
            $table->boolean('is_journalist')->default(0);
            $table->string('organization_name')->nullable();
            $table->string('organization_type')->nullable();
            $table->string('designation')->nullable();
            $table->date('start_journalism')->nullable();
            $table->boolean('is_personal_office')->default(0);
            $table->string('office_address')->nullable();
            $table->string('office_tehsil_block')->nullable();
            $table->string('office_country_id')->nullable();
            $table->string('office_state_id')->nullable();
            $table->string('office_city_id')->nullable();
            $table->string('office_zip')->nullable();
            $table->enum('reporter_status',['pending','process','approved'])->default('pending');
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
        Schema::dropIfExists('reporters');
    }
}

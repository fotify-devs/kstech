<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('education_level_id');
            $table->string('mean_grade');
            $table->string('fee_sponsor');
            $table->string('course_level');
            $table->string('nationality');
            $table->string('next_of_kin_name');
            $table->string('next_of_kin_number');
            $table->string('heard_about')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('education_level_id')->references('id')->on('education_levels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

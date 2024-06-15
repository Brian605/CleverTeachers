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
        Schema::create('unit_registrations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->bigInteger('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->string('status')->default('Active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_registrations');
    }
};

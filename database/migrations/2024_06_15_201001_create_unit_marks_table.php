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
        Schema::create('unit_marks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->double('cat1')->nullable();
            $table->double('cat2')->nullable();
            $table->double('exams')->nullable();
            $table->double('total')->nullable();
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_marks');
    }
};

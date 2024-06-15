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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->bigInteger('course');
            $table->bigInteger('department');
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->longText('image')->nullable();
            $table->bigInteger('userId');
            $table->bigInteger('classId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

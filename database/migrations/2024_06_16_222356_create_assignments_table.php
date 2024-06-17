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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('unitId')->unsigned();
            $table->foreign('unitId')->references('id')->on('units');
            $table->bigInteger('teacherId')->unsigned();
            $table->foreign('teacherId')->references('id')->on('teachers');
            $table->longText('description')->nullable();
            $table->longText('notes')->nullable();
            $table->json('attachments')->nullable();
            $table->string('title')->nullable();
            $table->double('marks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};

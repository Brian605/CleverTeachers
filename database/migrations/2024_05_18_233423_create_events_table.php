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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_short')->nullable();
            $table->string('category')->nullable();
            $table->string('organizer')->nullable();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->time('startTime')->nullable();
            $table->string('cost')->nullable();
            $table->json('sponsors')->nullable();
            $table->json('objectives')->nullable();
            $table->longText('banner')->nullable();
            $table->string('status')->nullable();
            $table->string('endTime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

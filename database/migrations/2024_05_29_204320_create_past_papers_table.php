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
        Schema::create('past_papers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('subject');
            $table->string('file');
            $table->bigInteger('views');
            $table->string('downloads');
            $table->string('school');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_papers');
    }
};

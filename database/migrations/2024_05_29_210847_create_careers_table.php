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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('banner');
            $table->longText('title');
            $table->longText('description');
            $table->longText('responsibilities');
            $table->longText('requirements');
            $table->date('applyBy');
            $table->bigInteger('maxApplications');
            $table->bigInteger('fees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};

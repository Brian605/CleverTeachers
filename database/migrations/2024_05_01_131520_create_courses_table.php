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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('intake')->nullable();
            $table->json('modules')->nullable();
               $table->string('status')->nullable();
                   $table->string('duration')->nullable();
                       $table->integer('lecs')->nullable();
                           $table->double('fees')->nullable();
                               $table->string('certificate')->nullable();
        $table->longText('preview')->nullable();
        $table->longText('video')->nullable();
        $table->longText('curriculum')->nullable();
        $table->string('category')->nullable();
            $table->string('grade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

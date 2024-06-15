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
            $table->timestamps();
            $table->string('regNumber');
            $table->string('kcpeNumber')->nullable();
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('email');
            $table->string('phone');
            $table->string('idNumber');
            $table->string('gender');
            $table->string('religion');
            $table->string('county');
            $table->string('residence');
            $table->string('history');
            $table->date('dateOfBirth');
            $table->longText('condition')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            $table->string('fatherPhone')->nullable();
            $table->string('motherPhone')->nullable();
            $table->string('fatherEmail')->nullable();
            $table->string('motherEmail')->nullable();
            $table->string('nokName')->nullable();
            $table->string('nokPhone')->nullable();
            $table->string('nokEmail')->nullable();
            $table->string('payerName')->nullable();
            $table->string('payerPhone')->nullable();
            $table->string('payerEmail')->nullable();
            $table->string('payerRelation')->nullable();
            $table->string('education')->nullable();
            $table->string('grade')->nullable();
            $table->string('school')->nullable();
            $table->string('schoolYear')->nullable();
            $table->bigInteger('course')->nullable();
            $table->bigInteger('intake')->nullable();
            $table->string('mode')->nullable();
            $table->json('examiners')->nullable();
            $table->json('passport')->nullable();
            $table->json('nationalId')->nullable();
            $table->string('slip')->nullable();
            $table->string('department')->nullable();
            $table->json('others')->nullable();
            $table->string('feePayer')->nullable();
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

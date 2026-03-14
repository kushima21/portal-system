<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('personel_id')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('mname')->nullable();
            $table->enum('gender', ['Male','Female']);
            $table->date('birthdate');
            $table->string('religion')->nullable();
            $table->string('address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable()->unique();
            $table->enum('civil_status', ['Single','Married','Divorced','Widowed'])->default('Single');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('school_id')->nullable();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->unique();
            $table->string('password');

            $table->enum('role', [
                'student',
                'adviser',
                'teacher',
                'registrar',
                'secretary',
                'principal',
                'admin',
                'super_admin'
            ])->default('student');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
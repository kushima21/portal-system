<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {

            $table->id('classroom_id');
            $table->string('year_level');
            $table->string('section');
            $table->string('year_level_category');
            $table->string('adviser');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
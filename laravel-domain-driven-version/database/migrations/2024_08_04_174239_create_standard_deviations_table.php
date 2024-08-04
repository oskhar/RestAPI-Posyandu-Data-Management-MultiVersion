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
        Schema::disableForeignKeyConstraints();

        Schema::create('standard_deviations', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ["L","P"]);
            $table->integer('age_in_months');
            $table->float('severely_underweight');
            $table->float('underweight');
            $table->float('normal_underweight');
            $table->float('healthy');
            $table->float('normal_overweight');
            $table->float('overweight');
            $table->float('severely_overweight');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standard_deviations');
    }
};

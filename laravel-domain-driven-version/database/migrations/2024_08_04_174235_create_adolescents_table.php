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

        Schema::create('adolescents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->constrained();
            $table->float('weight')->nullable()->unsigned();
            $table->float('height')->nullable()->unsigned();
            $table->float('waist_circumference')->nullable()->unsigned();
            $table->float('arm_circumference')->nullable()->unsigned();
            $table->float('hemoglobin')->nullable()->unsigned();
            $table->string('blood_pressure')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adolescents');
    }
};

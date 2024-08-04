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

        Schema::create('women_of_reproductive_ages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->constrained();
            $table->string('ks_stage')->nullable();
            $table->string('dasawisma_group')->nullable();
            $table->float('arm_circumference')->nullable()->unsigned();
            $table->unsignedInteger('number_of_living_children')->default(0);
            $table->unsignedInteger('number_of_deceased_children')->default(0);
            $table->text('immunization')->nullable();
            $table->string('contraception_type')->nullable();
            $table->date('contraception_replacement_date')->nullable();
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
        Schema::dropIfExists('women_of_reproductive_ages');
    }
};

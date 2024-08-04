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

        Schema::create('infant_weights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('infant_id')->constrained();
            $table->foreignId('standard_deviation_id')->constrained();
            $table->unsignedInteger('weighing_year');
            $table->unsignedInteger('weighing_month');
            $table->float('weight')->unsigned();
            $table->float('height')->nullable()->unsigned();
            $table->float('mid_upper_arm_circumference')->nullable()->unsigned();
            $table->float('head_circumference')->nullable()->unsigned();
            $table->string('measurement_method')->nullable();
            $table->string('ntob')->nullable();
            $table->boolean('exclusive_breastfeeding')->default(false);
            $table->boolean('vitamins_a')->nullable();
            $table->boolean('tetanus_neonatorum')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infant_weights');
    }
};

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

        Schema::create('infants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->constrained();
            $table->unsignedInteger('child_order')->nullable();
            $table->float('birth_weight')->nullable()->unsigned();
            $table->float('birth_height')->nullable()->unsigned();
            $table->boolean('is_imd')->default(false);
            $table->boolean('is_exclusive_breastfeeding')->default(false);
            $table->text('services_received')->nullable();
            $table->string('immunization_based_on_weight');
            $table->boolean('has_kms')->default(false);
            $table->boolean('has_kia')->default(false);
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
        Schema::dropIfExists('infants');
    }
};

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

        Schema::create('pregnant_womens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->constrained();
            $table->string('dasawisma_group');
            $table->date('registration_date');
            $table->integer('pregnancy_age');
            $table->integer('pregnancy_order');
            $table->float('lila');
            $table->string('supplementary_feeding');
            $table->text('iron_pills');
            $table->text('immunizations');
            $table->boolean('vitamins_a')->nullable();
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
        Schema::dropIfExists('pregnant_womens');
    }
};

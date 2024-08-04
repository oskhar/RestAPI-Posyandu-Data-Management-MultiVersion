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

        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_local_resident')->default(true);
            $table->text('detail')->nullable();
            $table->text('address')->nullable();
            $table->integer('rt');
            $table->integer('rw');
            $table->string('phone_number');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};

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

        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('challenge_id')->constrained();
            $table->foreignId('member_id')->constrained();
            $table->string('file');
            $table->string('link');
            $table->text('feedback')->nullable();
            $table->integer('ranking')->nullable();
            $table->unsignedInteger('poin')->default(0);
            $table->enum('status', ["Tersubmit","Sedang"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};

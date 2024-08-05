<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime')->nullable();
            $table->text('location')->nullable();
            $table->string('overview');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

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

        Schema::create('community_centers', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('district');
            $table->string('sub_district');
            $table->text('leader_statement');
            $table->string('structure_image')->nullable();
            $table->text('tasks_and_effects')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->foreignId('last_updated_by')->nullable()->constrained('users');
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
        Schema::dropIfExists('community_centers');
    }
};

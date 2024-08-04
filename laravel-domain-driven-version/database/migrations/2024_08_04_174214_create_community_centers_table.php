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

        Schema::create('community_centers', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('district');
            $table->string('sub_district');
            $table->string('neighborhood');
            $table->text('leader_statement');
            $table->string('organizational_structure_image');
            $table->text('vision');
            $table->text('mission');
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

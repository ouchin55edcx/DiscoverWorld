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
    {   Schema::disableForeignKeyConstraints();
        Schema::create('adventures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('tips')->nullable();
            $table->string('placeName');
            $table->timestamps();
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adventures'); // Corrected table name
    }
};

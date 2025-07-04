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
        Schema::create('pilgrimage_batch_trip', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pilgrimage_batch_id')->constrained('pilgrimage_batches')->onDelete('cascade');
            $table->foreignId('transportation_trip_id')->constrained('transportation_trips')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilgrimage_batch_transportation_trip');
    }
};

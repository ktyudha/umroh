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
        Schema::create('transportation_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transportation_id')->constrained('transportations')->onDelete('cascade');
            $table->dateTime('date_departure');
            $table->dateTime('date_return');
            $table->string('from_airport');
            $table->string('to_airport');
            $table->string('flight_number');
            $table->enum('status', ['scheduled', 'completed', 'cancelled'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_trips');
    }
};

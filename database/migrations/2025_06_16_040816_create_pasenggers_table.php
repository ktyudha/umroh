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
        Schema::create('pasenggers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travel_id')->constrained()->onDelete('cascade');
            $table->string('code', 12)->unique();
            $table->string('name');
            $table->integer('age');
            $table->string('city');
            $table->string('pickup_location')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasenggers');
    }
};

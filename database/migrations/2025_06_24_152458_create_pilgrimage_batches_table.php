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
        Schema::create('pilgrimage_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pilgrimage_type_id')->constrained('pilgrimage_types')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->dateTime('departure_date')->nullable();
            $table->dateTime('return_date')->nullable();
            $table->integer('duration')->nullable()->default(0);
            $table->unsignedBigInteger('price');
            $table->integer('quota')->default(0);
            $table->enum('status', ['sold', 'available', 'pending'])->default('available');
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilgrimage_batches');
    }
};

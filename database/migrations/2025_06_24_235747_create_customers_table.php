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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik')->unique();
            $table->string('email')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('marital_status', ['single', 'married', 'widow', 'widower'])->nullable();

            $table->string('phone')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();

            $table->string('name_father')->nullable();
            $table->string('name_mother')->nullable();
            $table->string('name_partner')->nullable();
            $table->integer('children_count')->nullable()->default(0);

            $table->string('passport_number')->nullable();
            $table->date('passport_issuer_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('passport_place_issued')->nullable();

            $table->foreignId('pilgrimage_type_id')->nullable()->constrained('pilgrimage_types')->nullOnDelete();
            $table->foreignId('pilgrimage_batch_id')->nullable()->constrained('pilgrimage_batches')->nullOnDelete();

            $table->text('image')->nullable();
            $table->text('kk')->nullable();
            $table->text('ktp')->nullable();
            $table->text('passport')->nullable();
            $table->text('vaccine_certificate')->nullable();
            $table->text('payment_proof')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

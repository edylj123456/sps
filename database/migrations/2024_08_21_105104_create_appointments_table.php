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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('owner_name');
            $table->string('owner_address');
            $table->string('owner_phone_number');
            $table->date('date_schedule');
            $table->string('dog_name');
            $table->string('dog_breed');
            $table->integer('dog_age');
            $table->enum('dog_sex', ['male', 'female']);
            $table->string('status')->default('processing');
            $table->string('dog_photo')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};

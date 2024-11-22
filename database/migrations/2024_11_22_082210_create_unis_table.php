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
        Schema::create('unis', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->int("zip_code")->nullable();
            $table->string("website")->nullable();
            $table->string("email")->nullable();
            $table->string("phone_number1")->nullable();
            $table->string("phone_number2")->nullable();
            $table->foreignId('uni_type_id')->constrained('uni_types')->references('id');
            $table->foreignId('boss_id')->constrained('users')->references('id');
            $table->foreignId('city_id')->constrained('cities')->references('id');
            $table->timestamps("established_year")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unis');
    }
};

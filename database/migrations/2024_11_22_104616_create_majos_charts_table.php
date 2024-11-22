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
        Schema::create('majors_chart', function (Blueprint $table) {
            $table->id();

            $table->name('name')->nullable(false);
            
            $table->unsignedBigInteger('uni_major_id'); 
            $table->foreign('uni_major_id')
                  ->references('id')
                  ->on('uni_majors')
                  ->onDelete('cascade')->nullable(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majos_charts');
    }
};

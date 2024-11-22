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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('university_id'); // Foreign key to unies table
            $table->string('name', 255)->nullable(false); // Name of the faculty
            $table->text('description')->nullable(); // Description of the faculty
            $table->timestamps(); // created_at and updated_at timestamps
 
            $table->foreign('boss_id')
                ->references('id')
                ->on('users');
    
            // Foreign key constraint
            $table->foreign('university_id')
                  ->references('id')
                  ->on('unies')
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};

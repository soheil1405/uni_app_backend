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
        Schema::create('uni_majors', function (Blueprint $table) {
            $table->id();

            $table->enum('degree_level', ['Bachelor', 'Master', 'Ph.D.'])->nullable(false); // Degree level
            $table->integer('duration')->nullable(false); // Duration of the program in years
            $table->text("description")->nullable();

            $table->unsignedBigInteger('university_id'); // Foreign key to unies table
            $table->unsignedBigInteger('faculty_id'); // Foreign key to faculties table
            $table->unsignedBigInteger('major_id'); // Foreign key to field_of_studies table
            
            // Foreign key constraints
            $table->foreign('university_id')
                  ->references('id')
                  ->on('unies')
                  ->onDelete('cascade');

            $table->foreign('faculty_id')
                  ->references('id')
                  ->on('faculties')
                  ->onDelete('cascade');

            $table->foreign('major_id')
                  ->references('id')
                  ->on('majors')
                  ->onDelete('cascade');

            // Composite unique constraint to ensure each major is unique within a university and faculty
            $table->unique(['university_id', 'faculty_id', 'major_id']);

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uni_majors');
    }
};

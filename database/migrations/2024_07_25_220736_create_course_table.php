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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('duration');
            $table->string('category');
            $table->string('level');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->text('outcomes')->nullable(); // New column for outcomes
            $table->date('start_date')->nullable(); // New column for starting date
            $table->string('instructor_experience')->nullable(); // New column for instructor experience
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};

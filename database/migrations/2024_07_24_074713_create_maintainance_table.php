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
        Schema::create('maintainance', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('time_line_status')->nullable();
            $table->string('time_line_1')->nullable();
            $table->string('time_line_1_header')->nullable();
            $table->string('time_line_1_description')->nullable();
            $table->string('time_line_1_link')->nullable();
            $table->string('time_line_2')->nullable();
            $table->string('time_line_2_header')->nullable();
            $table->string('time_line_2_description')->nullable();
            $table->string('time_line_2_link')->nullable();
            $table->string('time_line_3')->nullable();
            $table->string('time_line_3_header')->nullable();
            $table->string('time_line_3_description')->nullable();
            $table->string('time_line_3_link')->nullable();
            $table->string('time_line_4')->nullable();
            $table->string('time_line_4_header')->nullable();
            $table->string('time_line_4_description')->nullable();
            $table->string('time_line_4_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintainance');
    }
};

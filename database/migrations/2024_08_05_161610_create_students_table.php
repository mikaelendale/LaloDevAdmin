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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_no')->unique()->nullable();
            $table->string('password');
            $table->string('class_attended')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('payment')->nullable(); // or use tinyInteger if you prefer
            $table->string('telegram_username')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->date('dob')->nullable();
            $table->date('notification')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

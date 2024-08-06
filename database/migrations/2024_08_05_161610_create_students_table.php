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
            $table->string('password');
            $table->string('class_attended')->nullable();
            $table->text('profile')->default('https://cdn2.iconfinder.com/data/icons/leto-blue-online-education/64/__woman_laptop_student_studing-512.png');
            $table->string('status')->default('pending');
            $table->boolean('payment')->default('not_done'); // or use tinyInteger if you prefer
            $table->string('telegram_username')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->date('dob')->nullable();
            $table->date('notification')->default('on');
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

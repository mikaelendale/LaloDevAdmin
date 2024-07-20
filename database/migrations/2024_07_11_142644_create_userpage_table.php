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
        Schema::create('userpage', function (Blueprint $table) {
            $table->id();
            $table->string('info');
            $table->string('page_status')->default('on');
            $table->string('reason')->default('under maintainance');
            $table->string('description');
            $table->string('phone_no');
            $table->string('email');
            $table->string('location');
            $table->string('started_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userpage');
    }
};

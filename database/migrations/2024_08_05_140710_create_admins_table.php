<?php

use App\Models\Admins;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob');
            $table->text('avatar');
            $table->rememberToken();
            $table->timestamps();
        });
        Admins::create(['name' => 'admin', 'dob' => '2000-10-10', 'email' => 'admin@themesbrand.com', 'password' => Hash::make('12345678'), 'email_verified_at' => '2022-01-02 17:04:58', 'avatar' => 'images/avatar-1.jpg', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Admins');
    }
}

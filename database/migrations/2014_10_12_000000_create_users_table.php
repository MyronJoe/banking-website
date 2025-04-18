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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('user_type')->nullable();
            $table->string('dob')->nullable();
            $table->string('acc_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('city')->nullable();
            $table->string('next_kin')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('acc_type')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('zipCode')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

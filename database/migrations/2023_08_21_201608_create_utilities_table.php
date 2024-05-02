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
        Schema::create('utilities', function (Blueprint $table) {
            $table->id();
            $table->text('whiteLogo')->nullable();
            $table->text('blackLogo')->nullable();
            $table->text('faveicon')->nullable();
            $table->text('site_name')->nullable();
            $table->text('email')->nullable();
            $table->text('address')->nullable();
            $table->text('phone_no')->nullable();
            $table->text('page_title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilities');
    }
};

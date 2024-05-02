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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('user id')->nullable();
            $table->string('type')->nullable();
            $table->string('sender_acc')->nullable();
            $table->string('recipient_acc_number')->nullable();
            $table->string('remark')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('routine_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

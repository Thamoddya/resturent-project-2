<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('hotel_id')->nullable()->constrained('hotels');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->unique();
            $table->string('nic')->unique();
            $table->string('address');
            $table->string('payment_merchant_id')->nullable();
            $table->string('payment_merchant_secret')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

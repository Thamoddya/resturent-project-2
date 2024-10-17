<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->string('hotel_email');
            $table->text('hotel_image_path')->nullable();
            $table->integer('table_count')->default(0)->nullable();
            $table->string('hotel_id')->unique();
            $table->string('hotel_address');
            $table->string('hotel_mobile')->max(10)->unique();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};

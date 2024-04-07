<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->nullable()->constrained('hotels');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('menu_name');
            $table->double('menu_price');
            $table->string('menu_image_path');
            $table->integer('menu_available')->default(1);
            $table->text('menu_description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

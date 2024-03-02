<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('table_id');
            $table->string('table_name');
            $table->foreignId('hotel_id')->nullable()->constrained('hotels');
            $table->integer('max_seats')->default(0);
            $table->integer('isActive')->default(1); //Table is active to all users no any damage
            $table->integer('isReserved')->default(1); //Table is reserved or not
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};

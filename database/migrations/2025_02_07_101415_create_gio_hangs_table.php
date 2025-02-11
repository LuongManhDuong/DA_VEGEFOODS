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
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Khóa ngoại với bảng users
            $table->foreignId('san_pham_id')->constrained(); // Khóa ngoại với bảng san_phams
            $table->integer('quantity');
            $table->decimal('gia', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gio_hangs');
    }
};

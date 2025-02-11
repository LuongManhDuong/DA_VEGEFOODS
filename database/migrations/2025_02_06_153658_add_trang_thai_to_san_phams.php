<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('san_phams', function (Blueprint $table) {
            $table->boolean('trang_thai')->default(1)->after('so_luong'); // Đặt sau 'so_luong'
        });
    }

    public function down(): void
    {
        Schema::table('san_phams', function (Blueprint $table) {
            $table->dropColumn('trang_thai');
        });
    }
};

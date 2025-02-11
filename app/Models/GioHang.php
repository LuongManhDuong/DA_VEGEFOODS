<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;

    // Xác định bảng tương ứng
    protected $table = 'gio_hangs';

    // Các trường có thể gán đại trà (mass assignable)
    protected $fillable = [
        'user_id',
        'san_pham_id',
        'quantity',
        'gia'
    ];

    // Quan hệ với bảng 'users' (một giỏ hàng thuộc về một người dùng)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với bảng 'san_phams' (một giỏ hàng chứa một sản phẩm)
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
}

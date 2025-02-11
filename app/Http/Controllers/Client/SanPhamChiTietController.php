<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamChiTietController extends Controller
{
    public function index($id)
    {
        $sanPham = SanPham::findOrFail($id); // Tìm sản phẩm theo ID
        return view('clients.sanphams.chitiet', compact('sanPham'));
    }
}

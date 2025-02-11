<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\ThongTinTrangWeb;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $listDanhMucs = DanhMuc::where('trang_thai', 1)->get();
        $listSanPhams = SanPham::where('is_active', 1)->get();
         $thongTin = ThongTinTrangWeb::where('phone')->get();
        return view('clients.home.index', compact('listDanhMucs','listSanPhams','thongTin'));
    }
}

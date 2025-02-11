<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThongTinTrangWeb;
use Illuminate\Http\Request;

class ThongTinTrangWebController extends Controller
{
    public function index()
    {
        $thongTin = ThongTinTrangWeb::first();
        return view('admins.thongtintrangwebs.index', compact('thongTin'));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string',
            'email' => 'nullable|string',
        ]);
    
        $thongTin = ThongTinTrangWeb::first();
        if (!$thongTin) {
            $thongTin = new ThongTinTrangWeb();
        }
    
        // Remove the '_token' field before filling
        $data = $request->except('_token');
        $thongTin->fill($data);
        $thongTin->save();
    
        return redirect()->back()->with('success', 'Cập nhật thông tin trang web thành công.');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh Mục Sản Phẩm';
        $listDanhMuc = DanhMuc::orderByDesc('trang_thai')->get();

        return view('admins.danhmucs.index', compact('title', 'listDanhMuc'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm Danh Mục Sản Phẩm';

       
        return view('admins.danhmucs.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucRequest $request)
    {
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if($request->hasFile('hinh_anh')){
                $filepath = $request->file('hinh_anh')->store('uploads/danhmucs','public');
            }else{
                $filepath = null;
            }
        $params['hinh_anh'] = $filepath;
        DanhMuc::create($params);

        return redirect()->route('admins.danhmucs.index')->with('success', 'Thêm danh mục thành công');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Chỉnh Sửa Danh Mục Sản Phẩm';
        $danhMuc = DanhMuc::findOrFail($id);
        return view('admins.danhmucs.edit', compact('title','danhMuc'));
    }

    

    /** 
     * Update the specified resource in storage.
     */
    public function update(DanhMucRequest $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $danhMuc = DanhMuc::findOrFail($id);
            
            if ($request->hasFile('hinh_anh')) {
                // Xóa hình ảnh cũ nếu tồn tại
                if ($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)) {
                    Storage::disk('public')->delete($danhMuc->hinh_anh);
                }
                
                // Lưu hình ảnh mới
                $file = $request->file('hinh_anh')->store('uploads/danhmucs', 'public');
                $params['hinh_anh'] = $file;
            } 
    
            // Cập nhật dữ liệu
            $danhMuc->update($params);
    
            return redirect()->route('admins.danhmucs.index')->with('success', 'Cập nhật danh mục thành công');
        }
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhMuc = DanhMuc::findOrFail($id);

        if($danhMuc){
            $danhMuc->delete();
            if ($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)) {
                Storage::disk('public')->delete($danhMuc->hinh_anh);
            }
        }
        return redirect()->route('admins.danhmucs.index')->with('success', 'Xoá danh mục thành công');

    }
}

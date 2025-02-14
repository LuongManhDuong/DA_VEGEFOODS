<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\DanhMuc;
use App\Models\HinhAnhSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = ' Sản Phẩm';
        $listSanPham = SanPham::orderByDesc('is_type')->get();
        return view('admins.sanphams.index', compact('title','listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = ' Thêm Sản Phẩm';
        $listDanhMuc = DanhMuc::query()->get();
        return view('admins.sanphams.create', compact('title','listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
//     public function store(SanPhamRequest $request)
// {
//     if($request->isMethod('POST')){
//         $params = $request->except('_token');

//         // chuyen doi gia tri checkbox thanh boolean
//         $params['is_new'] = $request->has('is_new') ? 1 : 0;
//         $params['is_hot'] = $request->has('is_hot') ? 1 : 0;
//         $params['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
//         $params['is_show_home'] = $request->has('is_show_home') ? 1 : 0;
//         $params['trang_thai'] = $request->input('trang_thai', 1);

//         // Nếu không có giá khuyến mãi, gán giá sản phẩm vào giá khuyến mãi
//         $params['gia_khuyen_mai'] = $request->filled('gia_khuyen_mai') ? $request->input('gia_khuyen_mai') : $request->input('gia_san_pham');

//         // Xu lý hình ảnh đại diện
//         if($request->hasFile('hinh_anh')){
//             $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
//         }else{
//             $params['hinh_anh'] = null;
//         }

//         // Thêm sản phẩm vào cơ sở dữ liệu
//         $sanPham = SanPham::query()->create($params);

//         // Lấy id sản phẩm vừa thêm để thêm album
//         $sanPhamID = $sanPham->id;

//         // Xử lý thêm album
//         if($request->hasFile('list_hinh_anh')){
//             foreach($request->file('list_hinh_anh') as $image){
//                 if($image){
//                     $path = $image->store('uploads/hinhanhsanpham/id_'. $sanPhamID, 'public');
//                     $sanPham->hinhAnhSanPham()->create(
//                         [
//                             'san_pham_id' => $sanPhamID,
//                             'hinh_anh' => $path,
//                         ]
//                     );
//                 }
//             }
//         }

//         return redirect()->route('admins.sanphams.index')->with('success', 'Thêm sản phẩm thành công');
//     }
// }

public function store(SanPhamRequest $request)
{
    if($request->isMethod('POST')){
        $params = $request->except('_token');

        // Chuyển đổi giá trị checkbox thành boolean
        $params['is_new'] = $request->has('is_new') ? 1 : 0;
        $params['is_hot'] = $request->has('is_hot') ? 1 : 0;
        $params['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
        $params['is_show_home'] = $request->has('is_show_home') ? 1 : 0;
        $params['trang_thai'] = $request->input('trang_thai', 1);

        // Kiểm tra và gán giá trị cho gia_khuyen_mai
        $params['gia_khuyen_mai'] = $request->filled('gia_khuyen_mai') ? $request->input('gia_khuyen_mai') : $request->input('gia_san_pham');

        // Xử lý hình ảnh đại diện
        if($request->hasFile('hinh_anh')){
            $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
        }else{
            $params['hinh_anh'] = null;
        }

        // Lưu sản phẩm vào cơ sở dữ liệu
        $sanPham = SanPham::query()->create($params);

        // Lấy ID của sản phẩm vừa được tạo
        $sanPhamID = $sanPham->id;

        // Xử lý hình ảnh album
        if($request->hasFile('list_hinh_anh')){
            foreach($request->file('list_hinh_anh') as $image){
                if($image){
                    $path = $image->store('uploads/hinhanhsanpham/id_'. $sanPhamID, 'public');
                    $sanPham->hinhAnhSanPham()->create([
                        'san_pham_id' => $sanPhamID,
                        'hinh_anh' => $path,
                    ]);
                }
            }
        }

        // Trả về thông báo thành công
        return redirect()->route('admins.sanphams.index')->with('success', 'Thêm sản phẩm thành công');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = ' Cập Nhập Thông Tin Sản Phẩm';
        $listDanhMuc = DanhMuc::query()->get();
        $sanPham = SanPham::query()->findOrFail($id);
        return view('admins.sanphams.edit', compact('title','listDanhMuc','sanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params = $request->except('_token','_method');

            // chuyen doi gia tri checkbox thanh boolean
            $params['is_new'] = $request->has('is_new') ? 1 : 0;
            $params['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $params['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
            $params['is_show_home'] = $request->has('is_show_home') ? 1 : 0;
        
            $sanPham = SanPham::query()->findOrFail($id);
        
            // xu ly hinh anh dai dien
            if($request->hasFile('hinh_anh')){
                if($sanPham->hinh_anh && Storage::disk('public')->exists(($sanPham->hinh_anh))){
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            }else{
                $params['hinh_anh'] = $sanPham->hinh_anh;
            }

            //xu ly album

                $currentImages =$sanPham->hinhAnhSanPham->pluck('id')->toArray();
                $arrayCombine = array_combine($currentImages, $currentImages);

                foreach ($arrayCombine as $key => $value) {
                    if(!array_key_exists($key, $request->list_hinh_anh)){
                        $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);

                        // xoa hinh anh
                        if($sanPham->hinh_anh && Storage::disk('public')->exists(($sanPham->hinh_anh))){
                            Storage::disk('public')->delete($sanPham->hinh_anh);
                            $hinhAnhSanPham->delete();
                        }
                    }
                }

                // truong hop them hoac sua
                foreach ($request->list_hinh_anh as $key => $image) {
                    if(!array_key_exists($key, $arrayCombine)){
                        if($request->hasFile("list_hinh_anh.$key")){
                            $path = $image->store('uploads/hinhanhsanpham/id_'. $id, 'public');
                            $sanPham->hinhAnhSanPham()->create([
                                'san_pham_id' => $id,
                                'hinh_anh' => $path,
                            ]);
                        }
                }else if(is_file($image) && $request->hasFile("list_hinh_anh.$key")){
                    // truong hop thay doi hinh anh
                    $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                  
                        if($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)){
                            Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                        }
                        $path= $image->store('uploads/hinhanhsanpham/id_'. $id, 'public');
                        $hinhAnhSanPham->update([
                            'hinh_anh' => $path,
                        ]);
                }


            $sanPham->update($params);
            
            return redirect()->route('admins.sanphams.index')->with('success', 'Cập nhập thông tin sản phẩm thành công');
            }
         }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = SanPham::query()->findOrFail($id);

        // xoá hình ảnh đại diện của sản phẩm
        if($sanPham->hinh_anh && Storage::disk('public')->exists(($sanPham->hinh_anh))){
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        // xoá album
        $sanPham->hinhAnhSanPham()->delete();

        // xoá toàn bộ hình ảnh trong thư mục
        $path = 'uploads/hinhanhsanpham/id_'. $id;

        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->deleteDirectory($path);
        }

        // xoá sản phẩm
        $sanPham->delete();

        return redirect()->route('admins.sanphams.index')->with('success', 'Xoá sản phẩm thành công');


    }
}

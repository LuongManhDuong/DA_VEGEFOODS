<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function listCart(Request $request) {
        $cart = session()->get('cart', []);
    
        if (empty($cart)) {
            session()->forget('coupon'); // Xóa mã giảm giá nếu giỏ hàng trống
        }
    
        // Tính tổng tiền hàng (subTotal)
        $subTotal = array_sum(array_map(function($item) {
            return $item['gia'] * $item['so_luong'];
        }, $cart));
    
        // Lấy giá trị mã giảm giá từ session
        $coupon = session()->get('coupon', 0);
    
        // Lấy phí vận chuyển từ session (hoặc mặc định)
        $shipping = session()->get('shipping', 30000);
    
        // Tính tổng tiền sau khi trừ mã giảm giá
        $total = $subTotal + $shipping - $coupon;
    
        // Lưu các giá trị vào session
        session()->put('subTotal', $subTotal);
        session()->put('total', $total);
    
        // Truyền các giá trị đến view
        return view('clients.sanphams.giohang', compact('cart', 'total', 'shipping', 'subTotal', 'coupon'));
    }
    
public function addCart(Request $request){
    $productId = $request->input('product_id');
    $quantity = (int) $request->input('quantity', 1); // Đảm bảo quantity là số nguyên và có giá trị mặc định

    $sanPham = SanPham::query()->findOrFail($productId);

    // Lấy giỏ hàng từ session
    $cart = session()->get('cart', []);

    // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
    if (isset($cart[$productId])) {
        // Nếu sản phẩm đã có, kiểm tra và thêm số lượng
        $cart[$productId]['so_luong'] = isset($cart[$productId]['so_luong']) ? $cart[$productId]['so_luong'] + $quantity : $quantity;
    } else {
        // Nếu sản phẩm chưa có, thêm mới
        $cart[$productId] = [
            'ten_san_pham' => $sanPham->ten_san_pham,
            'so_luong' => $quantity, // Đảm bảo thêm key 'so_luong'
            'gia' => isset($sanPham->gia_khuyen_mai) ? $sanPham->gia_khuyen_mai : $sanPham->gia_san_pham,
            'hinh_anh' => $sanPham->hinh_anh,
        ];
    }

    // Lưu giỏ hàng vào session
    session()->put('cart', $cart);

    // Quay lại trang trước
    return redirect()->back();

}
public function storeCart(Request $request){
    $productId = $request->input('product_id');
    $quantity = (int) $request->input('quantity', 1); // Đảm bảo quantity là số nguyên và có giá trị mặc định

    $sanPham = SanPham::query()->findOrFail($productId);

    // Lấy giỏ hàng từ session
    $cart = session()->get('cart', []);

    // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
    if (isset($cart[$productId])) {
        // Nếu sản phẩm đã có, kiểm tra và thêm số lượng
        $cart[$productId]['so_luong'] = isset($cart[$productId]['so_luong']) ? $cart[$productId]['so_luong'] + $quantity : $quantity;
    } else {
        // Nếu sản phẩm chưa có, thêm mới
        $cart[$productId] = [
            'ten_san_pham' => $sanPham->ten_san_pham,
            'so_luong' => $quantity, // Đảm bảo thêm key 'so_luong'
            'gia' => isset($sanPham->gia_khuyen_mai) ? $sanPham->gia_khuyen_mai : $sanPham->gia_san_pham,
            'hinh_anh' => $sanPham->hinh_anh,
        ];
    }

    // Lưu giỏ hàng vào session
    session()->put('cart', $cart);

    // Quay lại trang trước
    return redirect()->route('cart.list');
}

public function showCheckout()
{
    $coupon = session('coupon', 0); // Default to 0 if no coupon exists in the session
    return view('checkout', compact('coupon'));
}


    

    public function updateCart(Request $request){
        $cartNew = $request->input('cart' , []);

        session()->put('cart', $cartNew);
        return redirect()->back();
    }

    public function applyCoupon(Request $request) {
        $cart = session()->get('cart', []);
    
        if (empty($cart)) {
            return redirect()->back()->withErrors(['error' => 'Giỏ hàng trống!']);
        }
    
        $coupon_code = $request->input('coupon_code');
        $coupon = Coupon::where('name', $coupon_code)
                        ->where('expiration_date', '>=', now())
                        ->first();
    
        if (!$coupon) {
            return redirect()->back()->withErrors(['error' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn!']);
        }
    
        $subTotal = array_sum(array_map(function ($item) {
            return $item['so_luong'] * ($item['gia_khuyen_mai'] ?? $item['gia']);
        }, $cart));
    
        $couponValue = 0;
        if ($coupon->type == 'fixed') {
            $couponValue = $coupon->value;
        } elseif ($coupon->type == 'percentage') {
            $couponValue = ($subTotal * $coupon->value) / 100;
        }
        $shipping = 30000;
    
        $total = $subTotal - $couponValue + $shipping;
    
        session()->put('subTotal', $subTotal);
        session()->put('coupon', $couponValue);
        session()->put('shipping', $shipping);
        session()->put('total', $total);
    
        return redirect()->back()->with('success', 'Mã giảm giá đã được áp dụng!');
    }

}

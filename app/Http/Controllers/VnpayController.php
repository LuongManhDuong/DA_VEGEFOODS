<?php

namespace App\Http\Controllers;

use App\Services\VnpayService;
use App\Models\DonHang;
use Illuminate\Http\Request;

class VnpayController extends Controller
{
    protected $vnpayService;

    public function __construct(VnpayService $vnpayService)
    {
        $this->vnpayService = $vnpayService;
    }

    // Tạo phương thức để chuyển hướng tới VNPAY
    public function createPayment($order_id)
    {
        $order = DonHang::findOrFail($order_id);  // Lấy đơn hàng theo ID
        $paymentUrl = $this->vnpayService->createPayment($order);

        return redirect()->to($paymentUrl);  // Chuyển hướng đến URL thanh toán VNPAY
    }

    // Xử lý trả kết quả từ VNPAY (sau khi thanh toán)
    public function vnpayReturn(Request $request)
    {
        // Xử lý kết quả trả về từ VNPAY
        // Xác thực kết quả thanh toán và cập nhật trạng thái đơn hàng
        $vnpResponseCode = $request->input('vnp_ResponseCode');
        if ($vnpResponseCode == '00') {
            $order = DonHang::findOrFail($request->input('vnp_TxnRef'));
            $order->trang_thai_id = 2;  // Đã thanh toán
            $order->save();

            return redirect()->route('orders.success')->with('success', 'Thanh toán thành công!');
        }

        return redirect()->route('orders.failed')->with('error', 'Thanh toán thất bại!');
    }
}

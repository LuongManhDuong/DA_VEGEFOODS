<?php

namespace App\Services;

class VnpayService
{
    // Đặt các cấu hình VNPAY ở đây, ví dụ:
    const VNPAY_URL = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'; // URL VNPAY
    

    public function createPayment($order)
    {
        // Thực hiện logic tạo thông tin thanh toán VNPAY và trả về URL thanh toán.
        // Đoạn này lấy thông tin từ đơn hàng để tạo request thanh toán.
        $data = [
            'vnp_TmnCode' => 'VNPAYTMCODE',  // Mã cửa hàng VNPAY
            'vnp_HashSecret' => 'VNPAYSECRETKEY', // Mã bí mật từ VNPAY
            'vnp_Amount' => $order->tong_tien * 100,  // Tổng tiền thanh toán (đơn vị đồng)
            'vnp_OrderInfo' => 'Thanh toán đơn hàng #' . $order->ma_don_hang,
            'vnp_OrderType' => 'billpayment',
            'vnp_ReturnUrl' => route('vnpay.return'),
            'vnp_TxnRef' => $order->id,  // Mã đơn hàng của bạn
            // Thêm các trường khác nếu cần
        ];

        // Sinh chuỗi ký tự VNPAY
        $vnpUrl = $this->buildRequestUrl($data);

        return $vnpUrl;
    }

    private function buildRequestUrl($data)
    {
        $url = self::VNPAY_URL . '?' . http_build_query($data);
        return $url;
    }
}

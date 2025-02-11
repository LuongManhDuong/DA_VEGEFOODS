<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirm;
use App\Models\ChiTietDonHang;
use App\Models\Coupon;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $donHang = Auth::user()->donHang;
        $donHang = DonHang::where('user_id', auth()->id())->get(); // Lấy danh sách đơn hàng của người dùng hiện tại
        // if (!$donHang) {
        //     $donHang = collect(); // Trả về một collection rỗng nếu không có đơn hàng
        // }
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;

        $type_cho_xac_nhan = DonHang::CHO_XAC_NHAN;
        $type_dang_van_chuyen = DonHang::DANG_VAN_CHUYEN;

        return view('clients.donhangs.index', compact('donHang','trangThaiDonHang','type_cho_xac_nhan','type_dang_van_chuyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     // dd(session()->all());
    //     $cart = session()->get('cart', []);
    //     if(!empty($cart)){
    //         $total = 0;
    //         $subTotal = 0;

    //         foreach($cart as $item){
    //             $subTotal += $item['gia'] * $item['so_luong'];
    //         }

    //         $shipping = 30000;

    //         $total = $subTotal + $shipping;
           

    //         return view('clients.donhangs.create', compact('cart','subTotal', 'shipping', 'total'));

    //     }
    //     return redirect()->route('cart.list');
    // }
    public function create()
{
    $cart = session()->get('cart', []);
    
    if (!empty($cart)) {
        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item['gia'] * $item['so_luong'];
        }

        $shipping = 30000;  // Phí vận chuyển cố định
        $coupon = session()->get('coupon', 0);  // Mã giảm giá lấy từ session, nếu không có thì mặc định là 0

        // Tính tổng tiền sau khi trừ mã giảm giá
        $total = $subTotal + $shipping - $coupon;

        // Truyền các biến vào view
        return view('clients.donhangs.create', compact('cart', 'subTotal', 'shipping', 'coupon', 'total'));
    }

    return redirect()->route('cart.list');
}



    public function store(Request $request)
    {
        // dd($request->all());
        if($request->isMethod('POST')){
            DB::beginTransaction();
            try {
                $params = $request->except('_token');
                $params['ma_don_hang'] = $this->generateUniqueOrderCode();
                // dd($params);
                $params['trang_thai_don_hang'] = DonHang::CHO_XAC_NHAN; // Mã trạng thái 'cho_xac_nhan'
                $params['trang_thai_thanh_toan'] = DonHang::DA_THANH_TOAN; // Mã trạng thái 'chua_thanh_toan'
                $donHang = DonHang::query()->create($params);
                $donHangId = $donHang->id;

                $cart = session()->get('cart', []);

                foreach ($cart as $key => $item) {

                    $thanhTien = $item['gia'] * $item['so_luong'];

                    $donHang->chiTietDonHang()->create([
                        'don_hang_id' => $donHangId,
                        'san_pham_id' => $key,
                        'don_gia' => $item['gia'], 
                        'so_luong' => $item['so_luong'],
                        'thanh_tien' => $thanhTien
                    ]);
                }
        
                

                DB::commit();

                // Mail::to($donHang->email_nguoi_nhan)->queue(new OrderConfirm($donHang));

                session()->put('cart', []);

                return redirect()->route('donhangs.index')->with('success', 'Đơn hàng được tạo thành công!!');
            } catch (\Exception $e){
                DB::rollBack();
                return redirect()->route('cart.list')->with('error', 'Có lỗi khi tạo đơn hàng, Vui lòng thử lại!!');
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);

        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;

        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;

        return view('clients.donhangs.show', compact('donHang', 'trangThaiDonHang', 'trangThaiThanhToan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        DB::beginTransaction();
        try{
            if($request->has('huy_don_hang')){
                $donHang->update(['trang_thai_don_hang' => DonHang::HUY_DON_HANG]);
            }elseif($request->has('dang_giao_hang')){
                $donHang->update(['trang_thai_don_hang' => DonHang::DA_GIAO_HANG]);
            }

            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Tạo mã đơn hàng tự động tăng : gen // check trùng tạo mã mới
    function generateUniqueOrderCode(){
        do {
            $orderCode = 'MDH-' . Auth::id() . '-' . now()->timestamp;
        } while (DonHang::where('ma_don_hang', $orderCode)->exists());
        return $orderCode;
    }

    public function createDonHang(Request $request)
    {
        // Debug session
        dd(session()->all());
    
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
    
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
    
        // Truyền các biến sang view
        return view('clients.donhangs.create', compact('cart', 'subTotal', 'shipping', 'coupon', 'total'));
    }
    
    public function vnpay_payment(){
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

        // end tổng tiền 

    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    // $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
    $vnp_Returnurl = "http://127.0.0.1:8000/donhangs/create";
    $vnp_TmnCode = "9ENF1EKC";//Mã website tại VNPAY 
    $vnp_HashSecret = "M9HX3QGW52NR6OW676EM2GK24I4SC0DH"; //Chuỗi bí mật
    
    $vnp_TxnRef = $this->generateUniqueOrderCode(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh Toán Đơn Hàng';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $total * 100;

    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    // $vnp_ExpireDate = $_POST['txtexpire'];
    //Billing
    // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
    // $vnp_Bill_Email = $_POST['txt_billing_email'];
    // $fullName = trim($_POST['txt_billing_fullname']);
    // if (isset($fullName) && trim($fullName) != '') {
    //     $name = explode(' ', $fullName);
    //     $vnp_Bill_FirstName = array_shift($name);
    //     $vnp_Bill_LastName = array_pop($name);
    // }
    // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
    // $vnp_Bill_City=$_POST['txt_bill_city'];
    // $vnp_Bill_Country=$_POST['txt_bill_country'];
    // $vnp_Bill_State=$_POST['txt_bill_state'];
    // // Invoice
    // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
    // $vnp_Inv_Email=$_POST['txt_inv_email'];
    // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
    // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
    // $vnp_Inv_Company=$_POST['txt_inv_company'];
    // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
    // $vnp_Inv_Type=$_POST['cbo_inv_type'];
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
        // "vnp_Bill_Email"=>$vnp_Bill_Email,
        // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
        // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
        // "vnp_Bill_Address"=>$vnp_Bill_Address,
        // "vnp_Bill_City"=>$vnp_Bill_City,
        // "vnp_Bill_Country"=>$vnp_Bill_Country,
        // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
        // "vnp_Inv_Email"=>$vnp_Inv_Email,
        // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
        // "vnp_Inv_Address"=>$vnp_Inv_Address,
        // "vnp_Inv_Company"=>$vnp_Inv_Company,
        // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
        // "vnp_Inv_Type"=>$vnp_Inv_Type
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

}

<?php
// Kiểm tra các tham số trả về từ VNPAY
if (isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == '00') {
    // Thanh toán thành công
    $paymentStatus = 'success';
} else {
    // Thanh toán thất bại
    $paymentStatus = 'failed';
}
?>
@extends('layouts.client')

@section('css')
<style>
  .text-end {
    text-align: right;
    margin-right: 20px;
    margin-top: 20px
}

</style>
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/client/images/bg_2.jpg')}});">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs text-warning"><span class="mr-2"><a href="{{ route('clients.home.index') }}">Trang chủ</a></span>/<span><a href="{{ route('cart.list') }}">Trở lai</a></span>/<span>Thanh toán</span></p>
          <h1 class="mb-0 bread">Thanh toán</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div>
      <form action="{{route('donhangs.store')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">

                <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
                <div class="row align-items-end">
                    <div class="col-md-6">
                        <div class="form-group">
                        
                            <label for="ten_nguoi_nhan">Họ và tên</label>
                            <input type="text" name="ten_nguoi_nhan" id="ten_nguoi_nhan" class="form-control" 
                            style="font-size: 14px;" placeholder="Nhập tên người nhận" 
                            value="{{ Auth::user()->name }}">
                                                 @error('ten_nguoi_nhan')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="so_dien_thoai_nguoi_nhan" class="required">Điện thoại</label>
                          <input type="text" name="so_dien_thoai_nguoi_nhan" class="form-control" style="font-size: 14px;" placeholder="Nhập SĐT người nhận" value="{{Auth::user()->phone}}">
                          @error('so_dien_thoai_nguoi_nhan')
                             <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                      </div>
              <div class="w-100"></div>
                  <div class="w-100"></div>
                  <div class="col-md-12">
                      <div class="form-group">
                      <label for="dia_chi_nguoi_nhan">Địa chỉ</label>
                    <input type="text" name="dia_chi_nguoi_nhan" class="form-control" style="font-size: 14px;" placeholder="Nhập địa chỉ" value="{{Auth::user()->address}}"> 
                    @error('dia_chi_nguoi_nhan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                  </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="w-100"></div>
                  
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="email_nguoi_nhan" class="required">
                        Địa chỉ Email</label>
                    <input type="text" name="email_nguoi_nhan" class="form-control" style="font-size: 14px;" placeholder="Nhập email người nhận" value="{{Auth::user()->email}}" >
                    @error('email_nguoi_nhan')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="ghi_chu">
                        Ghi chú</label>
                    <input type="text" name="ghi_chu" class="form-control" style="font-size: 14px;" placeholder="Nhập Ghi chú" value="{{Auth::user()->ghi_chu}}">
                    @error('ghi_chu')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                  </div>
              </div>
              <div class="w-100"></div>
              </div>
           
                  </div>
                  <div class="col-xl-5">
            <div class="row mt-5 pt-3">
              <div class="col-md-12 d-flex mb-5">
                <div class="cart-total mb-3">
                  <h3>Tổng số giỏ hàng</h3>
              
                  <div class="cart-items">
                      @foreach ($cart as $key => $item)
                          <div class="d-flex justify-content-between">
                              <div class="product-name" style="width: 70%;">
                                  <a href="">
                                      {{ $item['ten_san_pham'] }} <strong> x [{{ $item['so_luong'] }}]</strong>
                                      <input type="hidden" name="tien_hang" value="{{ $subTotal }}">
                                  </a>
                              </div>
                              <div class="product-price text-end" style="width: 30%;">
                                  {{ number_format($item['gia'] * $item['so_luong'], 0, '', '.') }} đ
                              </div>
                          </div>
                      @endforeach
                  </div>
              
                  <div class="cart-summary mt-3">
                      <div class="d-flex justify-content-between">
                          <div class="summary-label" style="width: 70%;">Vận chuyển</div>
                          <div class="summary-value text-end" style="width: 30%;">{{ number_format($shipping, 0, '', '.') }} đ</div>
                          <input type="hidden" name="tien_ship" value="{{ $shipping }}">
                      </div>
                      <div class="d-flex justify-content-between mt-2">
                        <div class="summary-label" style="width: 70%;">Giảm giá</div>
                          @if($coupon > 0)
                              <div class="summary-value text-end" style="width: 30%;">{{ number_format($coupon, 0, '', '.') }} đ</div>
                          @else
                          <div class="coupon" style="width: 30%;">
                            0đ
                        </div>
                          @endif
                      </div>
                  </div>
              
                  <hr>
              
                  <div class="d-flex justify-content-between total-price">
                      <div class="summary-label" style="width: 70%;">Tổng cộng</div>
                      <div class="summary-value text-end" style="width: 30%;"> <strong class="text-danger">{{ number_format($total, 0, '', '.') }} đ</strong></div>
                      <input type="hidden" name="tong_tien" value="{{ $total }}">
                  </div>
              
                  <!-- Debug -->
                  {{-- <p>Debug:</p>
                  <pre>
                      Cart: {{ print_r($cart, true) }}
                      SubTotal: {{ $subTotal }}
                      Shipping: {{ $shipping }}
                      Coupon: {{ $coupon }}
                      Total: {{ $total }}
                  </pre> --}}
              </div>
              </div>
              
              <div class="col-md-12">
                <div class="cart-detail p-3 p-md-4">
                    <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="radio">
                                <label><input type="radio" name="payment_method" value="cod" class="mr-2"> Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                      <div class="col-md-12">
                          <div class="checkbox">
                              <label><input type="checkbox" id="termsCheckbox" class="mr-2"> Tôi đã đọc và chấp nhận các điều khoản và điều kiện</label>
                          </div>
                      </div>
                  </div>

                   <div>
                    <?php if ($paymentStatus === 'success'): ?>
                    <span style="color: rgb(24, 207, 27)"> Thanh toán thành công*</span>
                    <?php endif ?>
                   </div>
                    <button id="orderBtn" type="submit" class="btn btn-warning py-2 px-4 mt-3" disabled><span style="color: white">Đặt hàng</span></button>
                </div>
            </div>
            
            </div>

        </div>
      </div>
    </div>
  </form>
  
  <div class="text-end mt-4">
    <!-- Hiển thị kết quả thanh toán -->
    <form action="{{route('donhangs.vnpay_payment')}}" method="POST">
        @csrf
        <div class="col-md-12">
            <!-- Nút thanh toán VNPAY -->
            <button id="vnpay-btn" type="submit" name="redirect" class="btn btn-primary">Thanh toán bằng VNPAY</button>
        </div>
    </form>
</div>


</div>


  </section>
 
@endsection
@section('js')
<script>
  // JavaScript để ẩn nút thanh toán nếu thành công
  document.addEventListener("DOMContentLoaded", function() {
      const paymentStatus = "<?php echo $paymentStatus; ?>";
      if (paymentStatus === "success") {
          // Ẩn nút thanh toán VNPAY khi thanh toán thành công
          document.getElementById('vnpay-btn').style.display = 'none';
      }
  });
</script>

<script>
  // Lấy đối tượng checkbox và nút đặt hàng
  const checkbox = document.getElementById('termsCheckbox');
  const orderBtn = document.getElementById('orderBtn');

  // Hàm kiểm tra trạng thái checkbox
  checkbox.addEventListener('change', function() {
      if (checkbox.checked) {
          orderBtn.disabled = false; // Kích hoạt nút đặt hàng
      } else {
          orderBtn.disabled = true; // Vô hiệu hóa nút đặt hàng
      }
  });
</script>
@endsection
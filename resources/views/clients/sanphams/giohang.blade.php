@extends('layouts.client')

@section('content')
    
<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/client/images/bg_2.jpg')}});">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('clients.home.index') }}">Trang chủ</a></span> <span>Giỏ hàng</span></p>
          <h1 class="mb-0 bread">Giỏ hàng của tôi</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-cart">
          <div class="container">
            @if (session('success'))
                <div class="alert alert-success dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if(empty($cart))
            <table class="table">
                <thead class="thead-primary">
                    <tr class="text-center">
                        <th>&nbsp;</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá </th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
            </table>
            <p class="text-center">Chưa có sản phẩm nào trong giỏ hàng.</p>
               
            @else
            <div class="row">
               
              <div class="col-md-12 ftco-animate">
                  <form action="{{route('cart.update')}}" method="POST">
                      @csrf
                      <div class="cart-list">
                          <table class="table">
                              <thead class="thead-primary">
                                  <tr class="text-center">
                                      <th>&nbsp;</th>
                                      <th>Hình ảnh</th>
                                      <th>Tên sản phẩm</th>
                                      <th>Giá </th>
                                      <th>Số lượng</th>
                                      <th>Tổng tiền</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($cart as $key =>  $item)
                                  <tr class="text-center">
                                      <td class="product-remove">
                                          <a href="#"><span class="ion-ios-close"></span></a>
                                      </td>
          
                                      <td class="image-prod">
                                          <div class="img" style="background-image:url('{{ asset('storage/' . $item['hinh_anh']) }}');"></div>
                                          <input type="hidden" name="cart[{{ $key }}][hinh_anh]" value="{{$item['hinh_anh']}}">
                                      </td>
          
                                      <td class="product-name">
                                          <h3>{{$item['ten_san_pham']}}</h3>
                                          <input type="hidden" name="cart[{{ $key }}][ten_san_pham]" value="{{$item['ten_san_pham']}}">
                                      </td>
          
                                      <td class="price">
                                          <span>{{ number_format($item['gia'], 0,'','.') }} đ</span>
                                          <input type="hidden" name="cart[{{ $key }}][gia]" value="{{$item['gia']}}">
                                      </td>
          
                                      <td class="quantity">
                                          <div class="input-group mr-3">
                                              <span class="input-group-btn mr-2">
                                                  <button type="button" class="quantity-left-minus btn btn-outline-secondary" data-type="minus" data-field="">
                                                      <i class="ion-ios-remove"></i>
                                                  </button>
                                              </span>
          
                                              <input type="text" name="cart[{{ $key }}][so_luong]" class="quantity form-control input-number" 
                                                     value="{{ $item['so_luong'] }}" min="1" data-price="{{ $item['gia'] }}" 
                                                     data-quantity="{{ $item['so_luong'] }}">
          
                                              <span class="input-group-btn ml-2">
                                                  <button type="button" class="quantity-right-plus btn btn-outline-secondary" data-type="plus" data-field="">
                                                      <i class="ion-ios-add"></i>
                                                  </button>
                                              </span>
                                          </div>
                                      </td>
          
                                      <td class="total">
                                          <span class="subtotal">
                                            {{ number_format($item['gia'] * $item['so_luong'] )}}đ
                                          </span>   
                                      </td>
                                  </tr><!-- END TR-->
                                  @endforeach
                              </tbody>
                          </table>
                          <!-- Canh phải và chỉnh kích thước nút cập nhật giỏ hàng -->
                          
                      </div>
                      <div class="text-right">
                        <button  type="submit" id="update-cart" class="btn btn-warning py-2 px-4 mt-3"><span style="color: white">Cập nhật giỏ hàng</span></button>
                    </div>
                  </form>
              </div>
          </div>
          @endif
          
          <div class="row justify-content-end">
              <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Mã giảm giá</h3>
                      <p>Nhập mã phiếu giảm giá của bạn nếu bạn có</p>
                        {{-- <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Mã giảm giá</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form> --}}
                        <form action="{{ route('cart.apply_coupon') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="coupon_code">Mã giảm giá</label>
                                <input type="text" class="form-control text-left px-3" id="coupon_code" name="coupon_code" placeholder="Nhập mã giảm giá">

                            </div>
                            <button  type="submit" id="apply_coupon" name="apply_coupon" class="btn btn-warning py-2 px-4 mt-3"><span style="color: white">Áp dụng phiếu giảm giá</span></button>
                        </form>
                        
                  </div>
              </div>
              <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Ước tính chi phí vận chuyển và thuế</h3>
                      <p>Nhập điểm đến của bạn để nhận được ước tính vận chuyển</p>
                        <form action="#" class="info">
                <div class="form-group">
                    <label for="">Quốc gia</label>
                  <input type="text" class="form-control text-left px-3" placeholder="">
                </div>
                <div class="form-group">
                    <label for="country">Tiểu bang/Tỉnh</label>
                  <input type="text" class="form-control text-left px-3" placeholder="">
                </div>
                <div class="form-group">
                    <label for="country">Mã bưu chính/Zip</label>
                  <input type="text" class="form-control text-left px-3" placeholder="">
                </div>
              </form>
                  </div>
                  {{-- <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Tổng số giỏ hàng</a></p> --}}
              </div>
              <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Tổng số giỏ hàng</h3>
                    <p class="d-flex">
                        <span>Tiền hàng</span>
                        <span class="sub-total">{{ number_format($subTotal, 0, '', '.') }}đ</span>
                    </p>
                    <p class="d-flex">
                        <span>Vận chuyển</span>
                        <span class="shipping">{{ number_format($shipping, 0, '', '.') }}đ</span>
                    </p>
                    <p class="d-flex">
                        <span>Giảm giá</span>
                        @if($coupon > 0)
                           <span class="coupon">{{ number_format($coupon, 0, '', '.') }}đ</span>
                        @endif
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Tổng cộng</span>
                        {{-- <span class="total-amount">{{ number_format($total, 0, '', '.') }}đ</span> --}}
                        <strong class="text-danger">{{ number_format($total, 0, '', '.') }}đ</strong>
                    </p>
                    {{-- Total: {{ $total }}
                    <p>Debug:</p>
                    <pre>
                        Cart: {{ print_r($cart, true) }}
                        SubTotal: {{ $subTotal }}
                        Shipping: {{ $shipping }}
                        Coupon: {{ $coupon }}
                        Total: {{ $total }}
                    </pre> --}}
                </div>
                <p><a href="{{route('donhangs.create')}}" class="btn btn-primary py-3 px-4">Tiến hành thanh toán</a></p>
            </div>
            
          </div>
          </div>
      </section>

      
@endsection

@section('js')

<script>
 $(document).ready(function() {
    $('.quantity-right-plus').click(function(e) {
        e.preventDefault();
        var $input = $(this).closest('.input-group').find('.quantity');
        var quantity = parseInt($input.val()) + 1;
        $input.val(quantity);
        updateSubtotal($input);
        updateTotal();  // Cập nhật lại tổng tiền khi thay đổi số lượng
    });

    $('.quantity-left-minus').click(function(e) {
        e.preventDefault();
        var $input = $(this).closest('.input-group').find('.quantity');
        var quantity = parseInt($input.val());

        if (quantity > 1) {
            $input.val(quantity - 1);
        }

        updateSubtotal($input);
        updateTotal();  // Cập nhật lại tổng tiền khi thay đổi số lượng
    });

    // Kiểm tra nhập liệu, không cho phép số âm
    $('.quantity').on('input', function() {
        var quantity = parseInt($(this).val());

        if (quantity < 1 || isNaN(quantity)) {
            $(this).val(1);
        }

        updateSubtotal($(this));
        updateTotal();  // Cập nhật lại tổng tiền khi thay đổi số lượng
    });
    function updateSubtotal($input) {
    var price = parseFloat($input.data('price')); // Lấy giá sản phẩm
    var quantity = parseInt($input.val()); // Lấy số lượng sản phẩm

    // Kiểm tra nếu price hoặc quantity không phải là số hợp lệ
    if (isNaN(price) || isNaN(quantity)) {
        return; // Nếu không hợp lệ, dừng lại
    }

    var subtotalElement = $input.closest('tr').find('.subtotal');
    var newSubtotal = price * quantity;

    subtotalElement.text(newSubtotal.toLocaleString('vi-VN') + ' đ');
}


function updateTotal(){
    var subTotal = 0;

    // Tính tổng số tiền của các sản phẩm có trong giỏ hàng
    $('.quantity').each(function(){
        var $input = $(this);
        var price = parseFloat($input.data('price'));
        var quantity = parseInt($input.val());

        // Kiểm tra nếu price hoặc quantity không phải là số hợp lệ
        if (isNaN(price) || isNaN(quantity)) {
            return; // Nếu không hợp lệ, bỏ qua sản phẩm này
        }

        subTotal += price * quantity;
    });

    // Lấy số tiền vận chuyển
    var shipping = parseFloat($('.shipping').text().replace(/\./g,'').replace(' đ', ''));
    if (isNaN(shipping)) shipping = 0; // Kiểm tra nếu số tiền vận chuyển không hợp lệ, đặt là 0

    var total = subTotal + shipping;

    // Cập nhật giá trị
    $('.sub-total').text(subTotal.toLocaleString('vi-VN') + ' đ'); 
    $('.total-amount').text(total.toLocaleString('vi-VN') + ' đ'); 
}


    // Xóa sản phẩm trong giỏ hàng
    $('.product-remove').on('click', function() {
        event.preventDefault(); // Chặn thao tác mặc định của thẻ a
        var $row = $(this).closest('tr');
        $row.remove(); // Xóa hàng
        updateTotal(); // Cập nhật tổng tiền sau khi xóa sản phẩm
    });

    updateTotal(); // Cập nhật tổng tiền ban đầu khi trang được tải
});
updateTotal();

    </script>
@endsection


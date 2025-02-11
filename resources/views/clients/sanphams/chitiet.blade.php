@extends('layouts.client')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .owl-nav-container i.owl-next{
        margin-left: 50px;
    }
    .btn-cart2 {
    background-color: black; /* Màu nền giống "Mua ngay" */
    color: white; /* Chữ trắng */
    padding: 12px 24px; /* Kích thước giống nhau */
    border-radius: 5px; /* Bo góc mềm mại */
    text-transform: uppercase; /* Chữ in hoa */
}

.btn-cart2:hover {
    background-color: #333; /* Màu hover */
}

.btn-cart2 {
    background: linear-gradient(135deg, #ff6a00, #ee0979); /* Hiệu ứng chuyển màu */
    color: white; /* Màu chữ trắng */
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px; /* Bo tròn góc */
    padding: 12px 20px;
    width: 230px;
    text-transform: uppercase; /* Chữ viết hoa */
    transition: all 0.3s ease-in-out; /* Hiệu ứng chuyển đổi */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Đổ bóng */
}

.btn-cart2:hover {
    background: linear-gradient(135deg, #ee0979, #ff6a00); /* Đảo ngược màu khi hover */
    transform: scale(1.05); /* Phóng to nhẹ */
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3); /* Tăng hiệu ứng đổ bóng */
}

.btn-cart2:active {
    transform: scale(0.98); /* Hiệu ứng nhấn xuống */
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
}


    
</style>
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/client/images/bg_2.jpg')}});">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('clients.home.index') }}">Trang chủ</a></span> <span class="mr-2"><a href="index.html">Sản phẩm</a></span> <span>Sản phẩm chi tiết</span></p>
          <h1 class="mb-0 bread">Sản phẩm chi tiết</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
      <div class="container">
          <div class="row">
          {{-- @foreach ($listSanPhams as $sanPham) --}}

              <div class="col-lg-6 mb-5 ftco-animate">
                  <a href="" class="image-popup"><img src="{{Storage::url($sanPham->hinh_anh)}}" class="img-fluid" alt="Colorlib Template"></a>
              </div>
              
              
              <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{$sanPham->ten_san_pham}}</h3>
                  <div class="rating d-flex">
                          <p class="text-left mr-4">
                              <a href="#" class="mr-2">5.0</a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                          </p>
                          <p class="text-left mr-4">
                              <a href="#" class="mr-2" style="color: #000;">{{$sanPham->so_luong}} <span style="color: #bbb;">Số lượng</span></a>
                          </p>
                      </div>
                      <p class="price">
                        @if($sanPham->gia_khuyen_mai < $sanPham->gia_san_pham)
                            <span class="mr-2 price-dc text-muted" style="text-decoration: line-through;">
                                {{ number_format($sanPham->gia_san_pham, 0, ',', '.') }}đ
                            </span>
                            <span class="price-sale text-success font-weight-bold">
                                {{ number_format($sanPham->gia_khuyen_mai, 0, ',', '.') }}đ
                            </span>
                        @else
                            <span class="price-normal text-success font-weight-bold">
                                {{ number_format($sanPham->gia_san_pham, 0, ',', '.') }}đ
                            </span>
                        @endif
                    </p>
                    
                  <p>{{$sanPham->noi_dung}}</p>
                      <div class="row mt-4">
                          <div class="col-md-6">
                              <div class="form-group d-flex">
                    {{-- <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down">xx</span></div>
                    <select name="" id="" class="form-control">
                        <option value="">Small</option>
                      <option value="">Medium</option>
                      <option value="">Large</option>
                      <option value="">Extra Large</option>
                    </select>
                  </div> --}}
                  </div>
                          </div>
                          <div class="w-100"></div>
                          <div class="input-group col-md-6 d-flex mb-3">

                </div>
            </div>
            <div class="d-flex">
                <form action="{{ route('cart.add') }}" method="POST" class="d-flex justify-content-between w-100">
                    @csrf
            
                    <div class="d-flex align-items-center">
                        <div class="input-group mr-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn btn-outline-secondary" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                    
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                    
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn btn-outline-secondary" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                    
                      
                            <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
                            <button style="width: 230px; border-radius: 50px;"  type="submit" class="btn btn-cart2"><span style="color: green">Thêm giỏ hàng</span></button>
                     
                    </div>
                    
            
                </form>
            </div>
            
            
            <div class="mt-4">
                   <div style="background-color: #000; width: 200px; border-radius: 50px; ">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
                        <input type="hidden" name="quantity" id="quantity" value="1">
                        <button style="width: 200px; border-radius: 50px;" type="submit" class="btn btn-cart2 "><span style="color: white">Mua ngay</span></button>
                    </form>
                   </div>
                    
            </div>
              </div>
              
            </div>
      </div>
  </section>


  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Sản phẩm nổi bật</span>
                <h2 class="mb-4">Sản phẩm của chúng tôi</h2>
                <p>Xa xa, đằng sau những ngọn núi, xa đất nước Vokalia và Consonantia</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="owl-carousel owl-theme">
            @foreach ($listSanPhams as $sanPhams)
                <div class="item">
                    <div class="product">
                        <a href="{{route('clients.sanphams.chitiet',['id' => $sanPhams->id])}}" class="img-prod">
                            <img class="img-fluid" src="{{Storage::url($sanPhams->hinh_anh)}}" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>

                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{$sanPhams->ten_san_pham}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    @if($sanPhams->gia_khuyen_mai < $sanPhams->gia_san_pham)
                                        <p class="price">
                                            <span class="mr-2 price-dc">{{$sanPhams->gia_san_pham}}đ</span>
                                            <span class="price-sale">{{$sanPhams->gia_khuyen_mai}}đ</span>
                                        </p>
                                    @else
                                        <p class="price">
                                            <span>{{$sanPhams->gia_san_pham}}đ</span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    {{-- <a href="{{ route('cart.list') }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a> --}}
                            
                                    <form action="{{ route('clients.shops.index') }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <input type="hidden" name="product_id" value="{{ $sanPhams->id }}">
                                        <button type="submit" style="border: none; background: none;">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </button>
                                    </form>
                                    <form action="{{ route('cart.add') }}" method="POST" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $sanPhams->id }}">
                                        <button type="submit" style="border: none; background: none;">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </button>
                                    </form>
                            
                                    <form action="{{ route('wishlist.add') }}" method="POST" class="buy-now d-flex justify-content-center align-items-center mx-1" >
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $sanPhams->id }}">
                                        <button type="submit"style="border: none; background: none;" >
                                            <span><i class="ion-ios-heart"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Nút điều hướng bên ngoài container -->
    <div class="owl-nav-container text-center">
        {{-- <button class="owl-prev"><i class="bi bi-sign-turn-left-fill"></i></button> --}}
        <i class="bi bi-skip-backward-fill owl-prev"></i>
        <i class="bi bi-skip-forward-fill owl-next"></i>

    </div>
</section>



@endsection

@section('js')
<script>
    $(document).ready(function(){
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,               // Quay vòng
        margin: 50,               // Khoảng cách giữa các item
        nav: false,                // Hiển thị nút điều hướng
        autoplay: true,           // Tự động cuộn
        autoplayTimeout: 3000,    // Thời gian mỗi lần chuyển
        autoplayHoverPause: true, // Dừng khi hover chuột
        dots: false,              // Tắt dấu chấm điều hướng
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    // Kết nối các nút điều hướng tùy chỉnh
    $('.owl-prev').click(function() {
        owl.trigger('prev.owl.carousel');
    });
    $('.owl-next').click(function() {
        owl.trigger('next.owl.carousel');
    });
});


</script>
<script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>1){
                $('#quantity').val(quantity - 1);
                }
        });
        // Kiểm tra nhập liệu, không cho phép số âm
		$('#quantity').on('input', function(){
			var quantity = parseInt($(this).val());

			// Nếu nhập giá trị âm, thiết lập lại về 1
			if (quantity < 1 || isNaN(quantity)) {
				$(this).val(1);
			}
		});
        $('.btn-cart2').click(function (e) {
            // Cập nhật lại giá trị của trường ẩn quantity trong form
            var quantity = $('#quantity').val();
            $("input[name='quantity']").val(quantity);
        });

        
    });
</script>

<script>
    $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
      $('.pro-qty').append('<span class="inc qtybtn">+</span>');
  
      $('.qtybtn').on('click', function () {
          var $button = $(this);
          var $input = $button.parent().find('input');
          var oldValue = parseFloat($input.val());
  
          if ($button.hasClass('inc')) {
              var newVal = oldValue + 1;
          } else {
              if (oldValue > 1) {
                  var newVal = oldValue - 1;
              } else {
                  var newVal = 1;
              }
          }
          $input.val(newVal);
      });
  
      $('#quantityInput').on('change', function () {
          var value = parseInt($(this).val(), 10);
  
          if (isNaN(value) || value < 1) {
              alert('Số lượng phải lớn hơn hoặc bằng 1');
              $(this).val(1);
          }
      });
  
  
      </script>


@endsection
@extends('layouts.client')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/client/images/bg_2.jpg')}});">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('clients.home.index') }}">Trang chủ </a></span> <span>Sản phẩm </span></p>
          <h1 class="mb-0 bread">Sản phẩm trong cửa hàng</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10 mb-5 text-center">
                  <ul class="product-category">
                      <li><a href="" class="active">All</a></li>
                      @foreach ($listDanhMucs as $danhMuc)
                      <li><a href="#">{{$danhMuc->ten_danh_muc}}</a></li>
                      @endforeach
                      {{-- <li><a href="#">Fruits</a></li>
                      <li><a href="#">Juice</a></li>
                      <li><a href="#">Dried</a></li> --}}
                  </ul>
              </div>
          </div>
          <div class="row">
              @foreach ($listSanPhams as $sanPhams)
                <div class="col-md-6 col-lg-3 ftco-animate">
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
          <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
      </div>
  </section>

      

@endsection
<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Sản phẩm nổi bật</span>
        <h2 class="mb-4">Sản phẩm của chúng tôi</h2>
        <p>Hãy thử ngay hôm nay để cảm nhận sự khác biệt từ trái cây sạch, tươi ngon và an toàn nhất!</p>
      </div>
    </div>   		
    </div>
    <div class="container">
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
        

    </div>
  </section>
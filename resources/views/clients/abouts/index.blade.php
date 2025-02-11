@extends('layouts.client')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/client/images/bg_2.jpg')}});">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('clients.home.index')}}">Trang chủ</a></span> <span>Thông tin</span></p>
          <h1 class="mb-0 bread">Về chúng tôi</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
          <div class="container">
              <div class="row mt-2">
                  <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('assets/client/images/about.jpg')}});">
                      <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                          <span class="icon-play"></span>
                      </a>
                  </div>
                  <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
            <div class="heading-section-bold mb-4 mt-md-5">
                <div class="ml-md-0">
                  <h2 class="mb-4">Chào mừng đến với Vegefoods, một trang web thương mại điện tử</h2>
              </div>
            </div>
            <div class="pb-md-5">
                <p>Hàng nghìn khách hàng đã tin tưởng và yêu thích sản phẩm của chúng tôi, còn bạn thì sao? Hãy thử ngay hôm nay để cảm nhận sự khác biệt từ trái cây sạch, tươi ngon và an toàn nhất!.</p>
                          <p>Nhưng chẳng có lời nào trong bản sao có thể thuyết phục được cô ấy, nên chẳng mấy chốc, một vài Copywriter xảo quyệt đã phục kích cô, chuốc cho cô say rượu Longe và Parole rồi lôi cô vào công ty của họ, nơi họ lạm dụng cô vì mục đích của họ..</p>
                          <p><a href="#" class="btn btn-primary">Mua ngay</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Đăng ký nhận bản tin của chúng tôi</h2>
                <span>Nhận thông tin cập nhật qua email về các cửa hàng mới nhất và các ưu đãi đặc biệt của chúng tôi</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                  <input type="text" class="form-control" placeholder="Nhập địa chỉ email">
                  <input type="submit" value="Đặt mua" class="submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
        </section>
      
      <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{asset('assets/client/images/bg_3.jpg')}});">
      <div class="container">
          <div class="row justify-content-center py-5">
              <div class="col-md-10">
                  <div class="row">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="10000">0</strong>
                      <span>Khách hàng hài lòng</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="100">0</strong>
                      <span>Các chi nhánh </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="1000">0</strong>
                      <span>Công sự</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="100">0</strong>
                      <span>Giải thưởng</span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      </div>
  </section>
      
      <section class="ftco-section testimony-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Chứng từ</span>
          <h2 class="mb-4">Khách hàng hài lòng của chúng tôi nói</h2>
          <p>Hàng nghìn khách hàng đã tin tưởng và yêu thích sản phẩm của chúng tôi, còn bạn thì sao? Hãy thử ngay hôm nay để cảm nhận sự khác biệt từ trái cây sạch, tươi ngon và an toàn nhất!</p>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url({{asset('assets/client/images/person_1.jpg')}})">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text text-center">
                  <p class="mb-5 pl-4 line">Chất lượng tạo nên thương hiệu, sức khỏe của bạn là ưu tiên hàng đầu!.</p>
                  <p class="name">Garreth Smith</p>
                  <span class="position">Marketing Manager</span>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">
  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services mb-md-0 mb-4">
      <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-shipped"></span>
      </div>
      <div class="media-body">
        <h3 class="heading">Miễn phí vận chuyển</h3>
        <span>Đơn hàng trên $100</span>
      </div>
    </div>      
  </div>
  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services mb-md-0 mb-4">
      <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-diet"></span>
      </div>
      <div class="media-body">
        <h3 class="heading">Luôn tươi mới</h3>
        <span>Gói sản phẩm tốt</span>
      </div>
    </div>    
  </div>
  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services mb-md-0 mb-4">
      <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-award"></span>
      </div>
      <div class="media-body">
        <h3 class="heading">Chất lượng cao cấp</h3>
        <span>Sản phẩm cao cấp</span>
      </div>
    </div>      
  </div>
  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services mb-md-0 mb-4">
      <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-customer-service"></span>
      </div>
      <div class="media-body">
        <h3 class="heading">Ủng hộ</h3>
        <span>Hỗ trợ 24/7</span>
      </div>
    </div>      
  </div>
</div>
    </div>
</section>
@endsection
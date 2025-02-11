<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+84 96297562</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">duongluong2k4@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">Giao hàng trong 3-5 ngày làm việc &amp; Trả hàng miễn phí</span>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ route('clients.home.index') }}">Vegefoods</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{ route('clients.home.index') }}" class="nav-link">Trang chủ</a></li>
          <li class="nav-item dropdown">
        </li>
          <li class="nav-item "><a href="{{route('clients.shops.index')}}" class="nav-link">Cửa hàng</a></li>
          <li class="nav-item "><a href="{{route('clients.abouts.index')}}" class="nav-link">Về chúng tôi</a></li>
          <li class="nav-item"><a href="{{route('clients.blogs.index')}}" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="{{route('clients.contacts.index')}}" class="nav-link">Liên hệ</a></li>
          {{-- <li class="nav-item cta cta-colored">
            <a href="{{route('cart.list')}}" class="nav-link">
            <span class="icon-shopping_cart">
              </span>[{{ session('cart') ? count(session('cart')) : '0' }}]
            </a>
          </li> --}}
          <li class="nav-item cta cta-colored dropdown">
            <a href="{{route('cart.list')}}" class="nav-link dropdown-toggle" id="cartDropdown" role="button">
                <span class="icon-shopping_cart"></span> [{{ session('cart') ? count(session('cart')) : '0' }}]
            </a>
            <div class="dropdown-menu" aria-labelledby="cartDropdown">
              <a class="dropdown-item" href="{{ route('donhangs.index') }}">Đơn hàng</a>
              <a class="dropdown-item" href="{{ route('wishlist.index') }}">Sản phẩm yêu thích</a>
            </div>
        </li>
        
        
        
        </ul>
      </div>
    </div>
  </nav>
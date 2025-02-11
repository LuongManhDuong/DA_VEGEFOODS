@extends('layouts.client')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/client/images/bg_2.jpg')}});">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs">
            <span class="mr-2"><a href="{{ route('clients.home.index') }}">Trang chủ</a></span>
            <span>Blog</span>
        </p>
                  <h1 class="mb-0 bread">Blog</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
              <div class="row">
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{asset('assets/client/images/image_1.jpg')}});"> 
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">Ngày 20 tháng 7 năm 2019</a></div>
                        <div><a href="#">Quản trị viên</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="#">Lợi ích của Rau Củ Quả Tươi trong Chế Độ Ăn Hàng Ngày</a></h3>
                      <p>Rau củ quả không chỉ cung cấp vitamin và khoáng chất thiết yếu mà còn giúp tăng cường hệ miễn dịch, hỗ trợ tiêu hóa và làm đẹp da. Bài viết này sẽ chia sẻ những lợi ích quan trọng của việc ăn rau củ tươi mỗi ngày.</p>
                      <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{asset('assets/client/images/image_2.jpg')}});"> 
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">Ngày 20 tháng 7 năm 2019</a></div>
                        <div><a href="#">Quản trị viên</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="#">Cách Nhận Biết Rau Củ Quả Sạch và Không Hóa Chất</a></h3>
                      <p>Bạn có biết cách phân biệt rau củ sạch và rau củ bị nhiễm hóa chất? Trong bài viết này, chúng tôi sẽ hướng dẫn bạn cách nhận biết rau củ an toàn và mẹo chọn mua sản phẩm tốt nhất cho gia đình.</p>
                      <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{asset('assets/client/images/image_3.jpg')}});"> 
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">Ngày 20 tháng 7 năm 2019</a></div>
                        <div><a href="#">Quản trị viên</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="#">Những Sai Lầm Khi Bảo Quản Rau Củ Quả Khiến Chúng Nhanh Hỏng</a></h3>
                      <p>Bảo quản rau củ không đúng cách có thể làm mất dinh dưỡng và khiến chúng nhanh hỏng. Hãy tránh những sai lầm thường gặp để giữ rau củ tươi ngon lâu hơn.</p>
                      <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{asset('assets/client/images/image_4.jpg')}});"> 
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">Ngày 20 tháng 7 năm 2019</a></div>
                        <div><a href="#">Quản trị viên</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="#">Chế Biến Rau Củ Đúng Cách Để Giữ Trọn Dinh Dưỡng</a></h3>
                      <p>Không phải cách nấu nào cũng giữ được dinh dưỡng của rau củ. Hãy cùng tìm hiểu phương pháp chế biến rau củ đúng cách để tận dụng tối đa lợi ích sức khỏe.</p>
                      <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{asset('assets/client/images/image_5.jpg')}});"> 
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">Ngày 20 tháng 7 năm 2019</a></div>
                        <div><a href="#">Quản trị viên</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="#">Top 10 Loại Rau Củ Quả Nên Ăn Theo Mùa Để Đạt Hiệu Quả Tốt Nhất</a></h3>
                      <p>Ăn rau củ theo mùa không chỉ giúp bạn có thực phẩm tươi ngon, giá rẻ mà còn đảm bảo dinh dưỡng tốt nhất. Hãy cùng tìm hiểu 10 loại rau củ nên ăn theo mùa.</p>
                      <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{asset('assets/client/images/image_6.jpg')}});"> 
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">Ngày 20 tháng 7 năm 2019</a></div>
                        <div><a href="#">Quản trị viên</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="#">Mua Rau Củ Quả Online – Xu Hướng Mới Cho Người Bận Rộn</a></h3>
                      <p>Mua rau củ online đang trở thành xu hướng mới giúp tiết kiệm thời gian và đảm bảo chất lượng sản phẩm. Cùng khám phá cách đặt hàng rau củ tươi ngon ngay tại nhà!</p>
                      <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                    </div>
                  </div>
                </div>
                      </div>
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
          <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon ion-ios-search"></span>
                <input type="text" class="form-control" placeholder="Tìm kiếm...">
              </div>
            </form>
          </div>
          <div class="sidebar-box ftco-animate">
              <h3 class="heading">Danh mục</h3>
            <ul class="categories">
              @foreach ($listDanhMucs as $danhMuc)
                <li><a href="#">{{ $danhMuc->ten_danh_muc }} <span>(1)</span></a></li>
              @endforeach
            
            </ul>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3 class="heading">Blog gần đây</h3>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url({{asset('assets/client/images/image_1.jpg')}});"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#">Lợi ích của Rau Củ Quả Tươi trong Chế Độ Ăn Hàng Ngày</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url({{asset('assets/client/images/image_2.jpg')}});"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#">Cách Nhận Biết Rau Củ Quả Sạch và Không Hóa Chất</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url({{asset('assets/client/images/image_3.jpg')}});"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#">Những Sai Lầm Khi Bảo Quản Rau Củ Quả Khiến Chúng Nhanh Hỏng</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
          </div>

          {{-- <div class="sidebar-box ftco-animate">
            <h3 class="heading">Tag Cloud</h3>
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link">fruits</a>
              <a href="#" class="tag-cloud-link">tomatoe</a>
              <a href="#" class="tag-cloud-link">mango</a>
              <a href="#" class="tag-cloud-link">apple</a>
              <a href="#" class="tag-cloud-link">carrots</a>
              <a href="#" class="tag-cloud-link">orange</a>
              <a href="#" class="tag-cloud-link">pepper</a>
              <a href="#" class="tag-cloud-link">eggplant</a>
            </div>
          </div> --}}

          <div class="sidebar-box ftco-animate">
            <h3 class="heading">Đoạn văn</h3>
            <p>🌿 Rau củ quả tươi sạch, an toàn cho sức khỏe! Chúng tôi cung cấp thực phẩm chất lượng cao, không hóa chất, giao tận nhà nhanh chóng. Hãy chọn ngay những sản phẩm tươi ngon nhất cho gia đình bạn 🥕🥦🍎!</p>
          </div>
        </div>

      </div>
    </div>
  </section> 

@endsection
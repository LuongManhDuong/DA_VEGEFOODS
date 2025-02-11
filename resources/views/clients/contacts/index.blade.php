@extends('layouts.client')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/client/images/bg_2.jpg')}});">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('clients.home.index')}}">Trang chủ</a></span> <span>Liên hệ</span></p>
          <h1 class="mb-0 bread">Liên hệ</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-4 d-flex">
            <div class="info bg-white p-4 w-100 text-center">
                <p><span>Địa chỉ:</span> Hồng Việt, Đông Hưng, Thái Bình, Việt Nam</p>
            </div>
        </div>
        <div class="col-4 d-flex">
            <div class="info bg-white p-4 w-100 text-center">
                <p><span>Số điện thoại:</span> <a href="tel://1234567920">+84 961297562</a></p>
            </div>
        </div>
        <div class="col-4 d-flex">
            <div class="info bg-white p-4 w-100 text-center">
                <p><span>Email:</span> <a href="mailto:info@yoursite.com">duongluong2k4@gmail.com</a></p>
            </div>
        </div>
    </div>
    
      <div class="row block-9">
    <!-- Form -->
    <div class="col-md-6 d-flex">
        <form action="#" class="bg-white p-5 contact-form w-100">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tên của bạn">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Email của bạn">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Vấn đề">
            </div>
            <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Ghi chú"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Gửi tin nhắn" class="btn btn-primary py-3 px-5">
            </div>
        </form>
    </div>

    <!-- Ảnh -->
    <div class="col-md-6 d-flex">
        <a href="#" class="img-prod w-100 h-100">
            <img class="img-fluid w-100 h-100" src="{{ asset('assets/client/images/bg_2.jpg') }}" alt="Colorlib Template" style="object-fit: cover;">
            <div class="overlay"></div>
        </a>
    </div>
</div>

    </div>
  </section>
@endsection
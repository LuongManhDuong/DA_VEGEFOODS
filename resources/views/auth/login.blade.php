@extends('layouts.auth')

@section('title')
    Đăng Nhập
@endsection

@section('content')
@if(session('alert'))
    <script type="text/javascript">
        alert("{{ session('alert') }}");
    </script>
@endif

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset('assets/auth/images/logos/logo.png') }}" width="180" alt="">
                            </a>
                            <p class="text-center">Chào mừng dến với VEGEFOODS!</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                                    @error('password')
                                    <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label text-dark" for="remember">
                                            Ghi nhớ đăng nhập
                                        </label>
                                    </div>
                                    <a class="text-primary fw-bold" href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Đăng nhập</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Bạn chưa có tài khoản?</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Đăng ký ngay</a>
                                </div>
                            </form>
                            {{-- <div class="mt-4 text-center">
                                <h6 class="fs-13 mb-4 title">Đăng nhập bằng</h6>
                                <a href="#" class="btn btn-success">
                                    <i style="color: red" class="ri-google-fill fs-16"> Đăng nhập bằng Google</i>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
  
@endsection

@extends('layouts.auth')

@section('title')
    Đặt lại mật khẩu
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
                            <p class="text-center">Đặt lại mật khẩu</p>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu mới</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Đặt lại mật khẩu</button>

                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Quay lại trang</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Đăng nhập</a>
                                </div>
                            </form>
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

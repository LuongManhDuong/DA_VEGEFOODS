@extends('layouts.auth')

@section('content')

<!-- Form Quên Mật Khẩu -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset('assets/auth/images/logos/logo.png') }}" width="180" alt="Logo">
                            </a>
                            <p class="text-center">Khôi phục mật khẩu</p>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email của bạn" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Gửi yêu cầu</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Quay lại đăng nhập</a>
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

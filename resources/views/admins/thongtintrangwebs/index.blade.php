@extends('layouts.admin')

@section('title', 'Quản lý Thông Tin Trang Web')

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-center">
            <h4 class="fs-18 fw-semibold m-0">Quản lý Thông Tin Trang Web</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Thông Tin Trang Web</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admins.thongtintrangwebs.update', $thongTin->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số Điện Thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ $thongTin->phone ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $thongTin->email ?? '' }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </form>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div> <!-- container-fluid -->
</div> 
@endsection

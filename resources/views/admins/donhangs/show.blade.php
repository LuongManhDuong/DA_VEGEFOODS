@extends('layouts.admin')

@section('title')
{{$title}}
@endsection

@section('css')

@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý đơn hàng</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">{{$title}}</h5>
                    </div><!-- end card header -->

                        <div class="card-body">
                            {{-- <table class="table table-striped mb-0"> --}}
                                <table class="table table-striped mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Tên người nhận</th>
                                            <th>Email người nhận</th>
                                            <th>Số điện thoại người nhận</th>
                                            <th>Địa chỉ người nhận</th>
                                            <th>Ghi chú</th>
                                            <th>Ngày đặt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>{{$donHang->ten_nguoi_nhan}}</strong></td>
                                            <td>{{$donHang->email_nguoi_nhan}}</td>
                                            <td>{{$donHang->so_dien_thoai_nguoi_nhan}}</td>
                                            <td>{{$donHang->dia_chi_nguoi_nhan}}</td>
                                            <td>{{$donHang->ghi_chu}}</td>
                                            <td>{{$donHang->created_at->format('d-m-Y')}}</td>
                                       
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><strong>Tiền hàng</strong></th>
                                            <th><strong>Vận chuyển</strong></th>
                                            <th><strong>Tổng tiền</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{number_format($donHang->tien_hang,0,'','.')}}đ </td>
                                            <td>{{number_format($donHang->tien_ship,0,'','.')}}đ </td>
                                            <td class="text-danger"><strong>{{number_format($donHang->tong_tien,0,'','.')}}đ </strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Trạng thái thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-danger"><strong>{{$trangThaiDonHang[$donHang->trang_thai_don_hang]}}</strong></td>
                                            <td class="text-danger"><strong>{{$trangThaiThanhToan[$donHang->trang_thai_thanh_toan]}}</strong></td>
                                            {{-- <td>{{$donHang->tien_hang}}đ </td>
                                            <td>{{$donHang->tien_ship}}đ </td>
                                            <td>{{$donHang->tong_tien}}đ </td> --}}
                                            {{-- <td>{{$donHang->created_at->format('d-m-Y')}}</td> --}}
                                       
                                        </tr>
                                    </tbody>
                                </table>
                            {{-- </table> --}}
                        </div>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                    <div class="myaccount-content">
                        <h5>Thông tin sản phẩm</h5>
                        <div class="myaccount-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHang->chiTietDonHang as $item)
                                    @php
                                        $sanPham = $item->sanPham;
                                    @endphp
                                    <tr>
                                        <td>
                                            <img alt="Sản phẩm hình ảnh" width="75px" src="{{Storage::url($sanPham->hinh_anh)}}" alt="">
                                        </td>
                                        <td>{{$sanPham->ma_san_pham}}</td>
                                        <td>{{$sanPham->ten_san_pham}}</td>
                                        
                                        <td>{{number_format($item->don_gia,0,'','.')}} đ</td>
                                        <td>{{$item->so_luong}}</td>
                                        <td>{{number_format($item->thanh_tien,0,'','.')}} đ</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <p><a href="{{route('admins.donhangs.index')}}" class="btn btn-primary py-3 px-4">Đơn hàng</a></p>

                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection

@section('js')
<script>
    function showImage(event) {
        const img_danh_muc = document.getElementById('img_danh_muc');

        const file = event.target.files[0];

        const render = new FileReader();

        render.onload = function() {
            img_danh_muc.src = render.result;
            img_danh_muc.style.display = 'block';
        }

        if (file) {
            render.readAsDataURL(file);
        }
    }
</script>
@endsection
@extends('layouts.client')

@section('css')
    <style>
        .tab-one img {
            max-width: 250px;
        }
        .breadcrumb-area {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .breadcrumb-area .breadcrumb {
            margin-bottom: 0;
        }
        .cart-main-wrapper {
            padding: 50px 0;
        }
        .section-bg-color {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .cart-table {
            margin-top: 20px;
        }
        .cart-table th, .cart-table td {
            vertical-align: middle;
        }
        .btn-sqr {
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 14px;
        }
        .bg-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .bg-success {
            background-color: #28a745;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('clients.home.index') }}"><i class="fa fa-home"></i> Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đơn hàng của tôi</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><strong>Mã đơn hàng</strong></th>
                                        <th><strong>Ngày đặt</strong></th>
                                        <th><strong>Trạng thái</strong></th>
                                        <th><strong>Tổng tiền</strong></th>
                                        <th><strong>Hành động</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHang as $item)
                                        <tr>
                                            <td class="text-center">
                                                <a href="{{ route('donhangs.show', $item->id) }}">
                                                    {{ $item->ma_don_hang }}
                                                </a>
                                            </td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td class="text-warning">{{ $trangThaiDonHang[$item->trang_thai_don_hang] }}</td>
                                            <td>{{ number_format($item->tong_tien, 0, '', '.') }} đ</td>
                                            <td>
                                                <a class="btn btn-sqr btn-primary" href="{{ route('donhangs.show', $item->id) }}">Xem</a>
                                            
                                                <form action="{{ route('donhangs.update', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                            
                                                    @if ($item->trang_thai_don_hang === $type_cho_xac_nhan)
                                                        <input type="hidden" name="huy_don_hang" value="1">
                                                        <button type="submit" class="btn btn-sqr bg-danger" onclick="return confirm('Bạn có muốn huỷ đơn hàng này không?')">Huỷ</button>
                                                    @elseif ($item->trang_thai_don_hang === $type_dang_van_chuyen)
                                                        <input type="hidden" name="da_giao_hang" value="1">
                                                        <button type="submit" class="btn btn-sqr bg-success" onclick="return confirm('Xác nhận đã nhận hàng?')">Đã nhận hàng</button>
                                                    @endif
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Thêm các script cần thiết (nếu có) -->
@endsection
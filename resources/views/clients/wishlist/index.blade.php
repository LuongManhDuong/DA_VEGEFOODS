@extends('layouts.client')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/client/images/bg_2.jpg')}});">
<div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('clients.home.index') }}">Trang chủ</a></span> <span>Yêu thích</span></p>
        <h1 class="mb-0 bread">Danh Sách Yêu Thích</h1>
      </div>
    </div>
  </div>
</div>

<div class="container mt-4">
    {{-- <h6 class="mb-4 text-center">Danh Sách Yêu Thích</h6> --}}

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($wishlists->isEmpty())
       
        <table class="table">
            <thead class="thead-primary">
                <tr class="text-center">
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá </th>
                    <th>Thao tác</th>
                </tr>
            </thead>
        </table>
        <p class="text-center">Chưa có sản phẩm nào trong wishlist.</p>
          
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="wishlist-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $wishlist)
                            <tr class="text-center">
                                
                                <td class="image-prod">
                                    <div class="img" style="background-image:url('{{ Storage::url($wishlist->product->hinh_anh) }}'); height: 80px; width: 80px; background-size: cover; background-position: center;"></div>
                                </td>
                                <td class="product-name">
                                    <span>{{ $wishlist->product->ten_san_pham }}</span>
                                </td>
                                <td class="price">
                                    <span>{{ number_format($wishlist->product->gia_san_pham) }} đ</span>
                                </td>
                                <td class="product-remove">
                                    <form action="{{ route('wishlist.remove', $wishlist->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

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
                <h4 class="fs-18 fw-semibold m-0">Quản lý sản phẩm</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title align-content-center mb-0">{{$title}}</h5>
                        <a class="btn btn-primary" href="{{route('admins.sanphams.create')}}"><i data-feather="plus-square"></i>Thêm sản phẩm</a>
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <div class="table-responsive">

                            @if (session('success'))
                                <div class="alert alert-success dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã sản phẩm</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Giá sản phẩm</th>
                                        <th scope="col">Giá khuyến mãi</th>
                                        {{-- <th scope="col">Giá khuyến mãi</th> --}}
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listSanPham as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $item->ma_san_pham }}</th>
                                        <td>
                                            <img src="{{Storage::url($item->hinh_anh)}}" width="100px" alt="">
                                        </td>
                                        <td>{{ $item->ten_san_pham }}</td>
                                        <td>{{ $item->danhMuc->ten_danh_muc }}</td>
                                        <td>{{ number_format($item->gia_san_pham) }}</td>
                                        {{-- <td>{{ empty($item->gia_khuyen_mai) ? 0 : number_format($item->gia_khuyen_mai) }}</td> --}}
                                        <td>
                                            {{ number_format($item->gia_khuyen_mai ?? $item->gia_san_pham) }}
                                        </td>
                                        
                                        <td>{{ $item->so_luong }}</td>
                                        <td 
                                            class="{{ $item->trang_thai == true ? 'text-success' : 'text-danger' }}">
                                            {{$item->trang_thai == true ? 'Hiển thị' : 'Ẩn'}}
                                        </td>
                                        <td>                                                       
                                            <a style="margin-right: 35px;" href="{{route('admins.sanphams.edit',$item->id)}}"><i class="bi bi-pencil-fill"></i></a>
                                            <form action="{{route('admins.sanphams.destroy',$item->id)}}" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá không?')" class="d-inline">
                                               
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="border-0">
                                                    <i class="bi bi-trash3-fill "></i>
                                                </button>
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
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')

@endsection
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
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title align-content-center mb-0">{{$title}}</h5>
                        {{-- <a class="btn btn-primary" href="{{route('admins.danhmucs.create')}}"><i data-feather="plus-square"></i>Thêm danh mục</a> --}}
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <div class="table-responsive">

                            @if (session('success'))
                                <div class="alert alert-success dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-success dismissible fade show" role="alert">
                                    {{session('error')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        {{-- <th>Trạng thái</th> --}}
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listDonHang as $item)
                                    <tr>
                                        <th>
                                            <a href="{{route('admins.donhangs.show', $item->id)}}">
                                                {{ $item->ma_don_hang }}
                                            </a>
                                        </th>
                                        <td>
                                            {{ $item->created_at->format('d-m-Y') }}
                                        </td>
                                        {{-- <td>
                                            {{ $trangThaiDonHang[$item->trang_thai_don_hang]}}
                                        </td> --}}
                                        
                                        <td>
                                            {{number_format($item->tong_tien,0,'','.') }} đ
                                        </td>
                                        <td>
                                            <form action="{{route('admins.donhangs.update',$item->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <select name="trang_thai_don_hang" class="form-select w-75"
                                                onchange="confirmSubmit(this)" data-default-value="{{$item->trang_thai_don_hang}}">
                                                    @foreach ($trangThaiDonHang as $key => $value) <!-- Fix: Changed $item to $value -->
                                                        <option value="{{$key}}"
                                                            {{ $key == $item->trang_thai_don_hang ? 'selected' : '' }}
                                                            {{ $key == $type_huy_don_hang ? 'disabled' : '' }}>
                                                            {{ $value }} <!-- Fix: Correctly outputting $value -->
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{route('admins.donhangs.show',$item->id)}}">
                                                <i class="bi bi-eye-fill"></i>                                          
                                              </a>

                                            {{-- @if ($item->trang_thai_don_hang !== $type_huy_don_hang)
                                            <form action="{{route('admins.donhangs.destroy',$item->id)}}" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá không?')" class="d-inline">
                                               
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="border-0 bg-white" disabled>
                                                    <i class="bi bi-trash3-fill"></i>

                                                </button>
                                            </form> 
                                            @endif --}}
                                            
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
    <script>
        function confirmSubmit(selectElement){
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            if(confirm('Bạn có chắc muốn thay đổi trạng thái đơn hàng thành "' + selectedOption + '" không?')){
                form.submit();
            }else{
                selectElement.value = defaultValue;
            }
        }
    </script>
@endsection

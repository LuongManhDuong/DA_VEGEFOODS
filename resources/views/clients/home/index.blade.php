@extends('layouts.client')
@section('content')
    @include('clients.home.banner')
    @include('clients.home.chungchi')
    @include('clients.home.danhmuc')
    @include('clients.home.sanpham')
    @include('clients.home.bestsale')
    @include('clients.home.thuonghieu')
    {{-- @include('clients.home.maill') --}}
@endsection

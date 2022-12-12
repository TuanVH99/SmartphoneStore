@extends('layouts.template')

@section('title','Đơn hàng của tôi')

@section('content')
    <div class="col-lg-12">
        <small><a href="{{ route('index') }}" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <a
            href="{{ route('my.order',['id'=>Session::get('customer')->id]) }}" class="text-dark">Đơn hàng</a>
        <i class="fas fa-angle-double-right"></i> <span class="introduce">Chi tiết đơn hàng</span></small>
        <div class="heading-lg mt-3">
            <h1>CHI TIẾT ĐƠN HÀNG</h1>
        </div>
    </div>
    <div class="container mt-4 mb-4">
        @php
            $total = 0;    
        @endphp
        @foreach ($products as $item)
            @php
                $total += $item->price * $item->qty;    
            @endphp
        @endforeach
        <h4 class="mb-4">Tổng giá trị đơn hàng: {{$total }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
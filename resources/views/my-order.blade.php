@extends('layouts.template')

@section('title','Đơn hàng của tôi')


@section('content')
    <div class="col-lg-12">
        <small><a href="{{ route('index') }}" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <span
            class="introduce">Đơn hàng của tôi</span></small>
        <div class="heading-lg mt-3">
            <h1>ĐƠN HÀNG CỦA TÔI</h1>
        </div>
    </div>
    
    @if (count($orders) <= 0)
        <div class="container">Hiện tại bạn chưa có đơn hàng nào cả.</div>
    @else
        <div class="container">
            <table class="table">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Thời gian tạo</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>{{ $item->order_code }}</td>
                        <td>{{$item->created_at }}</td>
                        <td>{{$item->price }}</td>
                        <td>
                            @if ($item->status === 0)
                                {{ 'Chờ xác nhận' }}
                            @elseif ($item->status === 1)
                                {{ 'Xác nhận' }}
                            @elseif ($item->status === 2)
                                {{ 'Hoàn thành' }}
                            @elseif ($item->status === 3)
                                {{ 'Hủy' }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('my.order.see',['code' => $item->order_code]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            @if($item->status === 0)
                                <a href="{{ route('my.order.cancel',['code' => $item->order_code]) }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    @endif
@endsection
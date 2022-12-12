@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đơn đặt hàng
                <small>Chi tiết</small>
            </h1>
        </div>
        @foreach ($products as $row)
            <!-- /.col-lg-12 -->
            <form method="POST" action="{{ route('order.edit',['code' => $row->order_code]) }}" style="margin-bottom: 3rem;">
                @csrf
                <select name="status" class="status" style="padding:0.4rem 0;outline:none;">
                    @if ($row->status === 0)
                        <option value="0" selected>Chờ xác nhận</option>
                        <option value="1">Xác nhận</option>
                        <option value="3">Hủy đơn hàng</option>
                    @elseif ($row->status === 1)
                        <option value="1" selected>Xác nhận</option>
                        <option value="2">Hoàn thành</option>
                    @elseif ($row->status === 2)
                        <option value="2" selected>Hoàn thành</option>
                    @else 
                        <option value="3" selected>Hủy đơn hàng</option>
                    @endif
                </select>
                <button type="submit" name="submit">Cập nhật</button>
            </form>
            @break
        @endforeach
        <table class="table table-striped table-bordered table-hover" id="menu-table">
            <thead>
                <tr align="center">
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $row)
                <tr class="even gradeC" align="center">
                    <th><?= $row->title ?></th>
                    <th><?= $row->qty ?></th>
                    <th><?= $row->price ?></th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('order.back') }}" type="button" class="btn btn-danger">Quay lại</a>
    </div>
    </div>
</div>
@endsection
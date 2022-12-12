@extends('admin.layouts.index')


@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn hàng
                        <small>Danh sách</small>
                    </h1>
                    @if(Session::has('invalid'))
                    <div class="alert alert-danger alert-dismissible">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('invalid')}}
                    </div>
                    @endif
                    @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{Session::get('success')}}
                            </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Mã khuyến mãi</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $row)
                            <tr>
                                <td>{{ $row->order_code }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->total_money }}</td>
                                <td>{{ !empty($row->code) ? $row->code : "Không có" }}</td>
                                <td>
                                    @if ($row->status === 0)
                                        {{ 'Chờ xác nhận' }}
                                    @elseif ($row->status === 1)
                                        {{ 'Xác nhận' }}
                                    @elseif ($row->status === 2)
                                        {{ 'Hoàn thành' }}
                                    @elseif ($row->status === 3)
                                        {{ 'Hủy' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('order.see',['code' => $row->order_code]) }}" style="margin-right:1rem;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @if($row->status === 0)
                                    <a href="{{ route('order.confirm',['code'=>$row->order_code]) }}" style="margin-right:1rem;"><i class="fa fa-check-square" aria-hidden="true"></i></i></a>
                                    <a href="{{ route('order.cancel',['code'=>$row->order_code]) }}"><i class="fa fa-times" aria-hidden="true"></i></i></a>
                                    @endif
                                  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
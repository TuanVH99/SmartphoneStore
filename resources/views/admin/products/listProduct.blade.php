@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
                        <th>Số thứ tự</th>
                        <th>Mã sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Mô tả</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Nhà cung cấp</th>
                        <th>Thương hiệu</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->sku }}</td>
                            <td><img src="{{ asset('storage/images/products/'.$product->image_path) }}" width=60px ></td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{!! $product->description !!}</td>
                            <td>{{ $product->cate_title }}</td>
                            <td>{{ $product->producer_name }}</td>
                            <td>{{ $product->brand_name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td> 
                                @if ($product->status === 1)
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td>
                                <a data-href="{{ route('product.delete',['id'=>$product->id]) }}" data-target="#confirm-delete" data-toggle="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                Bạn có chắc chắn sẽ muốn xóa sản phẩm này ?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger btn-ok">Xóa</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('product.edit.form',['id'=>$product->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="{{ route('product.disable',['id'=>$product->id]) }}" style="margin-right:1rem;"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                <a href="{{ route('product.enable',['id'=>$product->id]) }}"><i class="fa fa-check-square" aria-hidden="true"></i></i></a>
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
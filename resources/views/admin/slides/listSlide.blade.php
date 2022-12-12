@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
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
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Hình ảnh</th>
                        <th>Tên slide</th>
                        <th>Thứ tự xuất hiện</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($slides as $slide)
                        <tr>
                            <td>{{ $slide['id'] }}</td>
                            <td><img src="{{ asset('storage/images/slides/'.$slide['image_path']) }}" width=60px ></td>
                            <td>{{ $slide['name'] }}</td>
                            <td>{{ $slide['sort_order'] }}</td>
                            <td>
                                @if ($slide['status'] === 1)
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('slide.delete',['id'=>$slide['id']]) }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <a href="{{ route('slide.edit.form',['id'=>$slide['id']]) }}" style="margin:0 1rem;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="{{ route('slide.disable',['id'=>$slide['id']]) }}" style="margin-right:1rem;"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                <a href="{{ route('slide.enable',['id'=>$slide['id']]) }}"><i class="fa fa-check-square" aria-hidden="true"></i></i></a>
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
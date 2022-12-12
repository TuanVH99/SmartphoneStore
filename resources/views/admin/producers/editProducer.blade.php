@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhà cung cấp
                    <small>Sửa</small>
                </h1>
                <form action="{{ route('producer.edit',['id' => $producer['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="producer-name">Tên nhà cung cấp:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên nhà cung cấp" id="producer-name" name="producer-name" value='{{ $producer['name'] }}'>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <a href="{{ route('producer.back') }}" type="button" class="btn btn-danger">Quay lại</a>
                  </form>
            </div>
        </div>
    </div>   
</div>
@endsection
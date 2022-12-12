@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thương hiệu sản phẩm
                    <small>Sửa</small>
                </h1>
                <form action="{{ route('brand.edit',['id' => $brand['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="brand-name">Tên danh mục:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên thương hiệu" id="brand-name" name="brand-name" value='{{ $brand['name'] }}' required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <a href="{{ route('brand.back') }}" type="button" class="btn btn-danger">Quay lại</a>
                  </form>
            </div>
        </div>
    </div>   
</div>
@endsection
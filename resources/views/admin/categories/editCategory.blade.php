@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm
                    <small>Sửa</small>
                </h1>
                <form action="{{ route('category.edit',['id' => $category['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="category-name">Tên danh mục:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="category-name" name="category-name" value='{{ $category['title'] }}'>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <a href="{{ route('category.back') }}" type="button" class="btn btn-danger">Quay lại</a>
                  </form>
            </div>
        </div>
    </div>   
</div>
@endsection
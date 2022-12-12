@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('category.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="category-name">Tên danh mục:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="category-name" name="category-name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection
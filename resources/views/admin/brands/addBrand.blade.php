@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thương hiệu
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('brand.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="brand-name">Tên thương hiệu:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên thương hiệu" id="brand-name" name="brand-name" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Chọn hình ảnh</label>
                        <input id="image" type="file" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection
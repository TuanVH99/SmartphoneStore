@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="title">Tên sản phẩm:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="sku">Mã sản phẩm:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="sku" name="sku">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá tiền:</label>
                        <input type="number" class="form-control" placeholder="Nhập giá tiền" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" class="form-control" placeholder="Nhập số lượng" id="quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="content">Mô tả sản phẩm:</label>
                        <textarea class="form-control" id="content" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Danh mục sản phẩm:</label>
                        <select class="form-control" name="category_id" id="category_id">
                        <option value="">-- Chọn danh mục sản phẩm --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="producer_id">Nhà cung cấp:</label>
                        <select class="form-control" name="producer_id" id="producer_id">
                        <option value="">-- Chọn nhà cung cấp --</option>
                            @foreach ($producers as $producer)
                                <option value="{{ $producer['id'] }}">{{ $producer['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Thương hiệu sản phẩm:</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option value="">-- Chọn thương hiệu sản phẩm --</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                            @endforeach
                        </select>
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
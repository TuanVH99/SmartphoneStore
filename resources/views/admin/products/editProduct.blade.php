@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Sửa</small>
                </h1>
                <form action="{{ route('product.edit',['id' => $product['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="title">Tên sản phẩm:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="title" name="title" value="{{ $product['title'] }}">
                    </div>
                    <div class="form-group">
                        <label for="sku">Mã sản phẩm:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="sku" name="sku" value="{{ $product['sku'] }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá tiền:</label>
                        <input type="number" class="form-control" placeholder="Nhập giá tiền" id="price" name="price" value="{{ $product['price'] }}">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" class="form-control" placeholder="Nhập số lượng" id="quantity" name="quantity" value="{{ $product['quantity'] }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Mô tả sản phẩm:</label>
                        <textarea class="form-control" id="content" name="content">{!! $product['description'] !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Danh mục sản phẩm:</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                @if ($category['id'] === $product['category_id'])
                                    <option value="{{ $category['id'] }}" selected>{{ $category['title'] }}</option>
                                @else
                                    <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="producer_id">Nhà cung cấp:</label>
                        <select class="form-control" name="producer_id" id="producer_id">
                            @foreach ($producers as $producer)
                                @if ($producer['id'] === $product['producer_id'])
                                    <option value="{{ $producer['id'] }}" selected>{{ $producer['name'] }}</option>
                                @else
                                    <option value="{{ $producer['id'] }}">{{ $producer['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Thương hiệu sản phẩm:</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            @foreach ($brands as $brand)
                                @if ($brand['id'] === $product['brand_id'])
                                    <option value="{{ $brand['id'] }}" selected>{{ $brand['name'] }}</option>
                                @else
                                    <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection
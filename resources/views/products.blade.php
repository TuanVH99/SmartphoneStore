@extends('layouts.template')

@section('title')
Các sản phẩm
@endsection
@section('content')
<div class="container mt-3 mb-3">
    <div class="row mb-4">
        <div class="col-lg-3 col-md-12">
            <div class="menu-news">
                <h5 class="new-title">SẢN PHẨM</h5>
                <ul>
                    @foreach ($categories as $category)
                        <li><i class="fas fa-arrow-circle-right"></i> <a href="{{ route('product.category',['id' => $category->id]) }}">{{ $category->title }}</a></li>
                        <hr />
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="row ml-4">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-lg-3 mb-4">
                            <div class="product-item-box">
                                <div class="product-item">
                                    <div class="image">
                                        <a href="{{ route('product.detail',['id' => $product->id]) }}">
                                            <img src="{{ asset('storage/images/products/'.$product->image_path) }}" alt="{{ $product->id }}" width="100%" height="100%" name="product-image" class="product-image" />
                                        </a>
                                        <a href="{{ route('product.detail',['id' => $product->id]) }}" class="more-info"><i class="fas fa-search"></i> XEM THÊM</a>
                                    </div>
                                    <a href="{{ route('product.detail',['id' => $product->id]) }}" class="product-name mt-4">{{ $product->title }}</a>
                                    <div class="price-new" name="price-new">{{ number_format($product->price,-3,',',',') }} VND</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>Danh mục hiện tại chưa có sản phẩm, xin vui lòng quay lại sau.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
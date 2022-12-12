@extends('layouts.template')

@section('title','Smartphone')

@section('content')
    <div class="row banner-container">
        <div class="col-lg-9">
            <div id="banner" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    @foreach ($slides as $slide)
                        <?php $count = 0; ?>
                        @if ($slide->id === $slideFirst)
                            <li data-target="#banner" data-slide-to="{{ $count }}" class="active"></li>
                        @else
                            <li data-target="#banner" data-slide-to="{{ $count }}"></li>
                        @endif
                        <?php  $count++; ?>
                    @endforeach
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    @foreach ($slides as $slide)
                        @if ($slide->id === $slideFirst)
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/images/slides/'.$slide->image_path) }}" alt={{ $slide->id }}>
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ asset('storage/images/slides/'.$slide->image_path) }}" alt={{ $slide->id }}>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#banner" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#banner" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box-banner">
                <div class="banners">
                    @foreach ($specialBrand as $brand)
                        <a href="{{ route('brand.product',['id' => $brand->id]) }}">
                            <img src="{{ asset('storage/images/brands/'.$brand->img_path) }}" class="img-responsive mt-3" width="150px" height="100px"/>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="banners-2 row mt-4 mb-4">
        @foreach ($brands as $brand)
            <div class="col-lg-3">
                <a href="{{ route('brand.product',['id' => $brand->id]) }}">
                    <img src="{{ asset('storage/images/brands/'.$brand->img_path) }}" class="img-responsive" width="300px" height="150px"/>
                </a>
            </div>           
        @endforeach
    </div>
    {{ $brands->links() }}
    <h4>Sản phẩm</h4>
    <div class="text-right mb-3">
        <span>Sắp xếp </span><select class="form-select" id="form-select-filter"> 
            <option value="0" selected>Mặc định</option>
            <option value="1">Giá giảm dần</option>
            <option value="2">Giá tăng dần</option>
        </select>
    </div>
    @csrf
    <div class="row mb-4" id="product-container">
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
    </div>
    {{ $products->links() }}
    <div class="row mb-4">
        <div class="col-lg-3">
            <div class="sale-policy-block">
                <i class="fas fa-sync-alt"></i> HOÀN TRẢ TRONG VÒNG 30 NGÀY
            </div>
        </div>
        <div class="col-lg-3">
            <div class="sale-policy-block">
                <i class="fas fa-truck"></i> GIAO HÀNG MIỄN PHÍ
            </div>
        </div>
        <div class="col-lg-3">
            <div class="sale-policy-block">
                <i class="fas fa-shopping-basket"></i> THANH TOÁN LINH HOẠT
            </div>
        </div>
        <div class="col-lg-3">
            <div class="sale-policy-block">
                <i class="fas fa-users"></i> HỖ TRỢ KHÁCH HÀNG
            </div>
        </div>
    </div>
@endsection
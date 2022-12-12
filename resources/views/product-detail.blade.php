@extends('layouts.template')

@section('title')
{{ $product['title'] }}
@endsection
@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-3">
            <div class="menu-about">
                <div class="heading-lg">
                    <h1>CHÍNH SÁCH GIAO HÀNG</h1>
                </div>
                <ul class="list-group mb-5">
                    <li class="list-group-item">Giao hàng TOÀN QUỐC</li>
                    <li class="list-group-item">Thanh toán khi nhận hàng</li>
                    <li class="list-group-item">Đổi trả trong
                        <span class="color-pink">15 ngày</span></li>
                    <li class="list-group-item">Hoàn ngay tiền mặt</li>
                    <li class="list-group-item">Chất lượng đảm bảo</li>
                    <li class="list-group-item">Miễn phí vận chuyển:
                        <span class="color-pink">Đơn hàng từ 3 món trở lên</span></li>
                </ul>
                <div class="heading-lg">
                    <h1>HƯỚNG DẪN MUA HÀNG</h1>
                </div>
                <ul class="list-group mb-5">
                    <li class="list-group-item">Gọi điện thoại
                        <b class="color-pink">0337030033</b> để mua hàng</li>
                    <li class="list-group-item">Mua tại cửa hàng Phone Store:
                        <b class="color-pink">Hà Nội</b></li>
                    <li class="list-group-item">Mua sỉ/buôn xin gọi
                        <b>0337030033</b> để được hỗ trợ</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <small><a href="{{ route('index') }}" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <a
                    href="{{ route('products') }}" class="text-dark">Sản phẩm</a>
                <i class="fas fa-angle-double-right"></i> <span class="introduce">Chi tiết sản
                    phẩm</span></small>
            @if(Session::has('invalid'))
                <div class="alert alert-danger alert-dismissible mt-2">
                        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{Session::get('invalid')}}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible mt-2">
                        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{Session::get('success')}}
                </div>
            @endif
            <div class="row mt-4 mb-3">
                <div class="col-md-6 sp-large">
                    <a href=""><img src="{{ asset('storage/images/products/'.$product['image_path']) }}" alt="{{ $product['id'] }}"
                            alt=""></a>
                </div>
                <div class="col-md-6 describe">
                    <h2 class="ng-binding">{{ $product['name'] }}</h2>
                    <div class="price">
                        <span class="price-new ng-binding">Giá: {{ number_format($product['price'],-3,',',',') }} VND</span>
                    </div>
                    <span class="product-code ng-binding d-block mb-2"><b>Mã SP:</b> {{ $product['sku'] }} </span>
                    <form class="add-to-cart" method="POST" action="{{ route('add.to.cart',['id' => $product['id']]) }}">
                        @csrf
                        <div class="btn-buy mt-4">
                            <button type="submit" class="btn btn-danger btn-add-to-cart" style="background-color: rgb(200 20 255);">
                                <i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="menu-about">
                <div class="heading-lg mb-2">
                    <h1>CHI TIẾT SẢN PHẨM</h1>
                </div>
                <div class="content-describe mb-5 text-justify">
                    {!! $product['description'] !!}
                </div>
                <div class="heading-lg mb-2">
                    <h1>HỎI VÀ ĐÁP</h1>
                </div>
                @if (Session::has('customer'))
                    <form method="POST" action="{{ route('add.comment') }}" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="customer_id" value="{{ Session::has('customer') ? Session::get('customer')->id : '' }}" />
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}" />
                            <textarea class="form-control" rows="5" id="content" name="content" placeholder="Smartphone Store sẽ trả lời bạn từ 8h - 20h hằng ngày." required></textarea>
                            <button type="submit" name="submit" class="btn btn-danger mt-2">Gửi</button>
                        </div>
                    </form>
                @else
                <div class="mt-3 mb-3">
                    Vui lòng đăng nhập để có thể bình luận
                </div>  
                @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-content">
                                @foreach ($comments as $row)
                                    <div class="post-container">
                                        <img src="{{asset('assets/img/user/user.png')}}" alt="user" class="profile-photo-md pull-left">
                                        <div class="post-detail">
                                            <div class="user-info">
                                            <h5><div class="profile-link">{{ $row->username }}</div></h5>
                                            <p class="text-muted">Đăng lúc {{ $row->created_at }}</p>
                                            </div>
                                            <div class="line-divider"></div>
                                            <div class="post-text">
                                            <p>{{ $row->content }}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                                            </div>
                                            @if(Session::has('customer'))
                                            <a style="cursor: pointer; color:palevioletred;font-size:0.7rem;" cid="{{ $row->id }}" name_a="{{ Session::has('customer') ? Session::get('customer')->username:'' }}" token="{{ csrf_token() }}" class="reply"><i class="fas fa-comment-dots"></i> Phản hồi</a>
                                            <div class="reply-form">
                                        
                                                <!-- Dynamic Reply form -->
                                                
                                            </div>
                                            @endif
                                            <div class="line-divider"></div>
                                            @foreach ($replies as $reply)
                                                @if ($reply->comment_id === $row->id)
                                                    <div class="post-comment">
                                                        <img src="{{asset('assets/img/user/user.png')}}" alt="" class="profile-photo-sm">
                                                        <p><div class="profile-link mr-2">{{ $reply->name }}</div><i class="em em-laughing"></i>{{ $reply->reply_content }}</p>
                                                    </div>
                                                    @if(Session::has('customer'))
                                                    <span class="ml-2"><a style="cursor: pointer; color:palevioletred;font-size:0.7rem;" rid="{{ $row->id }}" rname="{{  Session::has('customer') ? Session::get('customer')->username:'' }}" token="{{ csrf_token() }}" class="reply-to-reply"><i class="fas fa-comment-dots"></i> Phản hồi</a></span>
                                                    <div class="reply-to-reply-form">
                                        
                                                        <!-- Dynamic Reply form -->
                                                        
                                                    </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $comments->links() }}
                        </div>
                    </div>
                <div class="heading-lg">
                    <h1>SẢN PHẨM HOT</h1>
                </div>
                    <div class="row">
                        @foreach ($randomProduct as $item)
                        <div class="col-3 mt-3">
                            <div class="card">
                                <div class="card-image">
                                    <a href="{{ route('product.detail',['id' => $item['id']]) }}">
                                        <img src="{{ asset('storage/images/products/'.$item['image_path']) }}" class="card-img-top" />
                                    </a>
                                </div>
                            </div>
                            <div class="box-product-block">
                                <div class="name text-center">
                                    <a href="{{ route('product.detail',['id' => $item['id']]) }}" class="text-dark">
                                        <b>{{ $item['title'] }}</b>
                                    </a>
                                </div>
                            </div>
                            <div class="price text-center">
                                <span class="price-new">{{ number_format($item['price'],-3,',',',') }} VND</span>
                            </div>

                        </div>
                        @endforeach
                    </div>
        </div>
    </div>
</div>
<style>
    /*  */
.post-content{
  background: #f8f8f8;
  border-radius: 4px;
  width: 100%;
  border: 1px solid #f1f2f2;
  margin-bottom: 20px;
  overflow: hidden;
  position: relative;
}

.post-content img.post-image, video.post-video, .google-maps{
  width: 100%;
  height: auto;
}

.btn-danger.focus,
.btn-danger:focus {
    box-shadow: 0 0 0 0.2rem rgb(200 20 255 / 50%);
}
.post-content .google-maps .map{
  height: 300px;
}

.post-content .post-container{
  padding: 20px;
}

.post-content .post-container .post-detail{
  margin-left: 65px;
  position: relative;
}

.post-content .post-container .post-detail .post-text{
  line-height: 24px;
  margin: 0;
}

.post-content .post-container .post-detail .reaction{
  position: absolute;
  right: 0;
  top: 0;
}

.post-content .post-container .post-detail .post-comment{
  display: inline-flex;
  margin: 10px auto;
  width: 100%;
}

.post-content .post-container .post-detail .post-comment img.profile-photo-sm{
  margin-right: 10px;
}

.post-content .post-container .post-detail .post-comment .form-control{
  height: 30px;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
  margin: 7px 0;
  min-width: 0;
}

img.profile-photo-md {
    height: 50px;
    width: 50px;
    border-radius: 50%;
}

img.profile-photo-sm {
    height: 40px;
    width: 40px;
    border-radius: 50%;
}

.text-green {
    color: #8dc63f;
}

.text-red {
    color: #ef4136;
}
.profile-link{
    color:palevioletred;
}
</style>
@endsection
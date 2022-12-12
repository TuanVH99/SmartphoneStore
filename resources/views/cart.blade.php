@extends('layouts.template')

@section('title','Giỏ hàng')

@section('content')
<div class="container mb-5">
    <div class="heading-link mt-3">
         <ul class="item">
              <li class="home">
                   <a href="{{ route('index') }}">Trang chủ</a>
              </li>
              <li class="icon active">
                   <a href={{ route('cart') }}>Giỏ hàng</a>
              </li>
         </ul>
    </div>
    <div class="heading-lg">
         <h1>GIỎ HÀNG CỦA TÔI</h1>
    </div>
    <div class="cart-block">
        <div class="cart-info table-responsive">
            @if (empty($products))
                <div class="alert alert-light text-center" role="alert">
                    Không có sản phẩm nào trong giỏ hàng
                </div>
                <a class="btn btn-default" href="{{ route('index') }}">Tiếp tục mua hàng</a>
            @else
            <table class="table product-list">
                <thead>
                    <tr>
                        <th class="text-left">Sản phẩm</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-right">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-right">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $product)
                        <tr>
                            <td class="name"><a href="{{ route('product.detail',['id' => $product['item']['id']]) }}" style="color:black;font-size:1rem;">{{ $product['item']['title'] }}</a></td>
                            <td class="image-product">
                                <img src="{{ asset('storage/images/products/'.$product['item']['image_path']) }}">
                            </td>
                            <td class="price text-right"></td>
                            <td class="quantity">
                                <div class="quantity-control" data-quantity="">
                                    <a class="quantity-btn" href="{{ route('decrease.item',['id' => $product['item']['id']]) }}"><svg viewBox="0 0 409.6 409.6"><g><g><path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" /></g></g></svg></a>
                                    <input type="number" class="quantity-input"
                                            min="1" value="{{ $product['qty'] }}" name="quantity" disabled>
                                    <a class="quantity-btn" href="{{ route('increase.item',['id' => $product['item']['id']]) }}"><svg viewBox="0 0 426.66667 426.66667"><path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" /></svg></a>
                                </div>
                            </td>
                            <td class="amount text-right">
                                {{ number_format($product['item']['price'] * $product['qty'],-3,',',',') }} VND
                            </td>
                            <td class="remove" style="cursor: pointer">
                                <a href="{{ route('delete.item', ['id' => $product['item']['id']]) }}" style="color:black;"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        @if (!empty($products))
            <div class="clearfix text-right">
                <span><b>Tổng tiền:</b></span>
                <span class="pay-price">
                    {{ number_format($totalPrice,-3,',',',') }}₫
                </span>
            </div>
            <div class="button text-right mt-3">
                <a class="btn btn-primary" href="{{ route('checkout') }}">Xác nhận giỏ hàng</a>
            </div>
        @endif
    </div>
</div>
@endsection
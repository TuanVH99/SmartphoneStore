@extends('layouts.template')

@section('title','Giỏ hàng')

@section('content')
<style>
    .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 35%; /* IE10 */
  flex: 35%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 65%; /* IE10 */
  flex: 65%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.input-form-pay {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

.hidden{
  display:none;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<div class="container mb-5">
    <div class="heading-link mt-3">
         <ul class="item">
              <li class="home">
                   <a href="{{ route('index') }}">Trang chủ</a>
              </li>
              <li class="icon">
                   <a style="color:black;" href={{ route('cart') }}>Giỏ hàng</a>
              </li>
              <li class="icon active">
                <a href={{ route('checkout') }}>Thanh toán</a>
           </li>
         </ul>
    </div>
    <div class="heading-lg">
         <h1>THANH TOÁN</h1>
    </div>
    <div class="row mt-4">
        <div class="col-75">
          <div class="container">
            <form action="{{ route('pay') }}" method="POST" id="checkout-form">
              <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                {{ Session::get('error') }}
              </div>
              @csrf
              <input type="hidden" name="customer_id" value="{{ $customer->id }}" />
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <input type="hidden" class="sum" value="{{ $totalPrice }}" />
              <input type='hidden' name='currency_code' value='VND'> 
              <div class="row">
                <div class="col-50">
                  <label for="card-name"><i class="fa fa-user"></i> Tên</label>
                  <input type="text" class="input-form-pay" id="card-name" value="{{ Session::get('customer')->username }}" readonly>
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" class="input-form-pay" id="email" name="email" value="{{ Session::get('customer')->email }}" readonly>
                  <label for="city"><i class="fas fa-map-marker-alt"></i> Thành phố</label>
                  <input type="text" class="input-form-pay" id="city" name="city" value="{{ $customer->c_name }}" disabled>
                  <label for="district"><i class="fas fa-map-marker-alt"></i> Quận/huyện</label>
                  <input type="text" class="input-form-pay" id="district" name="district" value="{{ $customer->d_name }}" disabled>
                  <label for="ward"><i class="fas fa-map-marker-alt"></i> Xã/phường</label>
                  <input type="text" class="input-form-pay" id="ward" name="ward" value="{{ $customer->w_name }}" disabled>
                  <label for="card-number">Số thẻ</label>
                  <input type="text" id="card-number" class="input-form-pay" required>
                  <label for="card-expiry-month">Hạn mức tháng</label>
                  <select name="card-expiry-month" id="card-expiry-month" class="input-form-pay" required>
                  <option value="">--Hạn mức tháng--</option>                   
                    @for($i = 1;$i<=12;$i++)
                         <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                  <label for="card-expiry-year">Hạn mức năm</label>
                  <select name="card-expiry-year" id="card-expiry-year" class="input-form-pay" required>
                  <option value="">--Hạn mức năm--</option>
                      @for($i = 2022;$i<=2030;$i++)
                         <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                  </select>
                  <label for="card-cvc">CVC</label>
                  <input type="text" id="card-cvc" class="input-form-pay" required>
                </div>
              </div>
              <button type="submit" class="btn">Thanh toán</button>
            </form>
          </div>
        </div>
        <div class="col-25">
          <div class="container">
            <h4>Giỏ hàng <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b style="font-size:16px">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</b></span></h4>
            @foreach ($products as $product)
                <p><a href="{{ route('product.detail',['id' => $product['item']['id']]) }}">{{ $product['item']['title'] }}</a> <span class="price">{{ number_format($product['item']['price'] * $product['qty'],-3,',',',') }} VND</span></p> 
            @endforeach
            <hr>
            <p>Total <span class="total-cart" style="color:black"><b>{{ number_format($totalPrice,-3,',','.') }} VND</b></span></p>
            <div class="mt-3">
              <div id="none-promotion"></div>
              <input type="text" id="promotion-code" name="promotion" placeholder="Nhập mã khuyến mãi (nếu có)" class="form-control"/>
              <button type="button" id="add-promotion" class="btn">Xác nhận</button>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
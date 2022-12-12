@extends('layouts.template')

@section('title','Đăng ký')

@section('content')

<div class="container">
    <div class="heading-link mt-3">
         <ul class="item">
              <li class="home">
                   <a href="{{  route('index') }}">Trang chủ</a>
              </li>
              <li class="icon active">
                   <a href="{{  route('register') }}">Đăng ký</a>
              </li>
         </ul>
    </div>
    <div class="row">
         <div class="col-md-3 mt-1 mb-3">
              <div class="heading-lg">
                   <h1>TÀI KHOẢN</h1>
              </div>
              <ul>
                   <li>
                        <a href="{{  route('register') }}">
                             <i class="fas fa-sign-in-alt"></i>
                             Đăng ký
                        </a>
                   </li>
                   <li>
                        <a href="{{  route('login') }}">
                             <i class="fas fa-sign-in-alt"></i>
                             Đăng nhập
                        </a>
                   </li>
                   <li>
                        <a href="{{  route('forgetpwdForm') }}">
                             <i class="fas fa-sign-in-alt"></i>
                             Quên mật khẩu
                        </a>
                   </li>
              </ul>
         </div>
         <div class="col-md-9 mt-1 mb-3">
              <div class="heading-lg">
                   <h1>ĐĂNG KÝ TÀI KHOẢN</h1>
              </div>
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
              <div class="form-checkout">
                   <form action="{{ route('handle.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2>THÔNG TIN TÀI KHOẢN</h2>
                        <div class="form-group">
                             <div class="row mr-auto ml-auto">
                                  <label for="username" class="col-sm-3">Tài khoản
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="text" class="col-sm-9 form-control" name="username" required>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="email" class="col-sm-3">Email
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="email" class="col-sm-9 form-control" name="email" required>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="password" class="col-sm-3">Mật khẩu
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="password" class="col-sm-9 form-control" name="password" required>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="repeatpassword" class="col-sm-3 ">Nhập lại mật khẩu
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="password" class="col-sm-9 form-control" name="repeatpassword" required>
                             </div>
                        </div>
                        <h2>THÔNG TIN CÁ NHÂN</h2>
                        <div class="form-group">
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="sex" class="col-sm-3 col-12">Giới tính
                                       <span class="warning">(*)</span>
                                  </label>
                                  <select name="sex" id="sex" class="col-12 col-sm-9 form-control">
                                       <option value="male">Nam</option>
                                       <option value="female">Nữ</option>
                                  </select>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="phone" class="col-sm-3">Số điện thoại
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="tel" pattern="[0-9]{10}" class="col-sm-9 form-control" name="phone" required>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="country" class="col-sm-3">Tỉnh/TP
                                       <span class="warning">(*)</span>
                                  </label>
                                  <select name="country" id="country" class="col-sm-9  form-control" required>
                                       <option value="">--Chọn tỉnh thành phố--</option>
                                        @foreach ($cities as $city)
                                             <option value="{{ $city->matp }}">{{ $city->name }}</option>
                                        @endforeach
                                  </select>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="district" class="col-sm-3">Quận huyện
                                       <span class="warning">(*)</span>
                                  </label>
                                  <select name="district" id="district" class="col-sm-9  form-control" required>
                                       <option value="">--Chọn quận/huyện--</option>
                                  </select>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="ward" class="col-sm-3">Xã phường
                                       <span class="warning">(*)</span>
                                  </label>
                                  <select name="ward" id="ward" class="col-sm-9  form-control" required>
                                       <option value="">--Chọn xã/phường--</option>
                                  </select>
                             </div>
                        </div>
                        <div class="form-group">
                             <div class="col-sm-8">
                                  <button type="submit" class="btn-checkout">Đăng kí</button>
                             </div>
                        </div>
                   </form>
              </div>
         </div>
    </div>
</div>
@endsection
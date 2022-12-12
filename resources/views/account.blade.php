@extends('layouts.template')

     @section('title','Thông tin tài khoản')

     @section('content')
     <div class="container">
          <div class="heading-link mt-3">
               <ul class="item">
                    <li class="home">
                         <a href="{{  route('index') }}">Trang chủ</a>
                    </li>
                    <li class="icon active">
                         <a href="{{  route('account') }}">Thông tin tài khoản</a>
                    </li>
               </ul>
          </div>
          <div class="row">
               <div class="col-md-3 mt-1 mb-3">
                    <div class="heading-lg">
                         <h1>Quản lý cá nhân</h1>
                    </div>
                    <ul>
                         <li>
                              <a href="{{  route('account') }}">
                                   <i class="fas fa-sign-in-alt"></i>
                                   Thông tin tài khoản
                              </a>
                         </li>
                         <li href="">
                              <a href="{{  route('my.order',['id'=>Session::get('customer')->id]) }}">
                                   <i class="fas fa-sign-in-alt"></i>
                                   Đơn hàng của tôi
                              </a>
                         </li>
                         <li>
                              <a href="{{  route('changepwdForm') }}">
                                   <i class="fas fa-sign-in-alt"></i>
                                   Thay đổi mật khẩu
                              </a>
                         </li>
                         <li>
                              <a href="{{ route('logout') }}">
                                   <i class="fas fa-sign-in-alt"></i>
                                   Thoát
                              </a>
                         </li>
                    </ul>
               </div>
               <div class="col-md-9 mt-1 mb-3">
                    @if(Session::has('invalid'))
                         <div class="alert alert-danger alert-dismissible mb-2">
                              <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              {{Session::get('invalid')}}
                         </div>
                    @endif
                    @if(Session::has('success'))
                         <div class="alert alert-success alert-dismissible mb-2">
                              <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              {{Session::get('success')}}
                         </div>
                    @endif
                    <div class="heading-lg">
                         <h1>Thông tin tài khoản</h1>
                    </div>
                    <div class="form-checkout account-detail">
                         <h2>THÔNG TIN TÀI KHOẢN</h2>
                         <p>Email: {{ Session::get('customer')->email }}</p>
                         <p>Mật khẩu: *** <a href="{{  route('changepwdForm') }}"><i class="fas fa-edit"></i></a></p>
                    </div>
                    <div class="heading-lg">
                         <h1>Thông tin cá nhân</h1>
                    </div>
                    <div class="form-checkout">
                         <form action="{{ route('handle.edit',['id' => Session::get('customer')->id ])}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <h2>THÔNG TIN CÁ NHÂN</h2>
                              <div class="form-group">
                                   <div class="row mt-4 mr-auto ml-auto">
                                        <label for="sex" class="col-sm-3 col-12">Giới tính
                                             <span class="warning">(*)</span>
                                        </label>
                                        <select name="sex" id="sex" class="col-12 col-sm-9 form-control">
                                             @if (Session::get('customer')->sex === "male")
                                                  <option value="male" selected>Nam</option>
                                                  <option value="female">Nữ</option>
                                             @else
                                                  <option value="male">Nam</option>
                                                  <option value="female" selected>Nữ</option>
                                             @endif
                                        </select>
                                   </div>
                                   <div class="row mt-4 mr-auto ml-auto">
                                        <label for="phone" class="col-sm-3">Số điện thoại
                                             <span class="warning">(*)</span>
                                        </label>
                                        <input type="tel" class="col-sm-9 form-control" name="phone" value="{{ Session::get('customer')->phone }}" required>
                                   </div>
                                   <div class="row mt-4 mr-auto ml-auto">
                                        <label for="country" class="col-sm-3">Tỉnh/TP
                                             <span class="warning">(*)</span>
                                        </label>
                                        <select name="country" id="country" class="col-sm-9  form-control" required>
                                             <option value="">--Chọn tỉnh thành phố--</option>
                                              @foreach ($cities as $city)
                                                   @if (Session::get('customer')->city_id === $city->matp)
                                                       <option value="{{ $city->matp }}" selected>{{ $city->name }}</option>
                                                   @else
                                                       <option value="{{ $city->matp }}">{{ $city->name }}</option>
                                                   @endif
                                              @endforeach
                                        </select>
                                   </div>
                                   <div class="row mt-4 mr-auto ml-auto">
                                        <label for="district" class="col-sm-3">Quận huyện
                                             <span class="warning">(*)</span>
                                        </label>
                                        <select name="district" id="district" class="col-sm-9  form-control" required>
                                             @foreach ($districts as $district)
                                                  @if ($district->maqh === Session::get('customer')->district_id)
                                                       <option value="{{ Session::get('customer')->district_id }}">{{ $district->name }}</option>
                                                  @endif
                                             @endforeach
                                        </select>
                                   </div>
                                   <div class="row mt-4 mr-auto ml-auto">
                                        <label for="ward" class="col-sm-3">Xã phường
                                             <span class="warning">(*)</span>
                                        </label>
                                        <select name="ward" id="ward" class="col-sm-9  form-control" required>
                                             @foreach ($wards as $ward)
                                                  @if ($ward->xaid === Session::get('customer')->ward_id)
                                                       <option value="{{ Session::get('customer')->ward_id }}">{{ $ward->name }}</option>
                                                  @endif
                                             @endforeach
                                        </select>
                                   </div>
                              </div>
                              <div class="form-group">
                                   <div class="col-sm-8">
                                        <button type="submit" class="btn-checkout">Cập nhật</button>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
     @endsection
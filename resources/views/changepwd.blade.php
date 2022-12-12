@extends('layouts.template')

@section('title','Thay đổi mật khẩu')

@section('content')
<div class="container">
    <div class="heading-link mt-3">
         <ul class="item">
              <li class="home">
                   <a href="{{  route('account') }}">Tài khoản của tôi</a>
              </li>
              <li class="icon active">
                   <a {{  route('changepwdForm') }}>Đổi mật khẩu</a>
              </li>
         </ul>
    </div>
    <div class="row">
         <div class="col-md-9 mt-1 mb-3">
              <div class="heading-lg">
                   <h1> ĐỔI MẬT KHẨU</h1>
              </div>
              @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible mt-2">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('success')}}
                    </div>
               @endif
               @if(Session::has('invalid'))
                    <div class="alert alert-danger alert-dismissible mt-2">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('invalid')}}
                    </div>
               @endif
              <form class="form-horizontal mt-4" method="POST" action="{{ route('changepwd',['id' => Session::get('customer')->id]) }}">
                   @csrf
                   <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Mật khẩu hiện tại:</label>
                        <div class="col-sm-10">
                             <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Mật khẩu hiện tại">
                        </div>
                   </div>
                   <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Mật khẩu mới</label>
                        <div class="col-sm-10">
                             <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu mới">
                        </div>
                   </div>
                   <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Nhập lại mật khẩu mới</label>
                        <div class="col-sm-10">
                             <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Nhập lại mật khẩu mới">
                        </div>
                   </div>
                   <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn-login">Thay đổi</button>
                        </div>
                   </div>
              </form>
         </div>
    </div>
</div>
@endsection
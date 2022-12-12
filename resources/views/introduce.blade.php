@extends('layouts.template')

@section('title','Giới thiệu')

@section('content')
<div class="row mt-4 mb-4">
    <div class="col-lg-3">
        <div class="menu-about">
            <h4>
                <span>
                    Giới thiệu
                </span>
            </h4>
            <ul>
                <li><i class="fas fa-angle-double-right"></i> <a href="{{ route('introduce') }}">Về chúng tôi</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="menu-header-introduce">
            <small><a href="{{ route('index') }}" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i>
                <span class="introduce">Giới thiệu</span></small>
            <h5 class="mt-3">VỀ CHÚNG TÔI</h5>
            <div class="content">

                <p>Cửa hàng điện thoại của chúng tôi chuyên cung cấp các dòng điện thoại mới nhất
                    phù hợp với tất cả hầu hết nhu cầu của khách hàng.
                </p>
                <br />
                <p>Với đội ngũ nhân viên nhiệt tình và hiếu khách, phong cách phục vụ chuyên nghiệp chắc
                    chắn sẽ đem lại cho quý khách một ấn tượng tuyệt vời!</p>
            </div>
        </div>
    </div>
</div>
@endsection
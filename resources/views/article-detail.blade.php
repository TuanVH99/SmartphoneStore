@extends('layouts.template')

@section('title','Thông tin bài viết')

@section('content')
<div class="mb-4 mt-4">
    <div class="col-lg-9 col-md-12">
        <small><a href="{{ route('index') }}" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <a
                href="{{ route('article') }}" class="text-dark">Bài viết</a> <i class="fas fa-angle-double-right"></i> <span
                class="introduce">{{ $article->title }}</span></small>
        <div class="new-detail-content">
            <h3 class="mt-3">Tiêu đề: {{ $article->title }}</h3><small>Đăng lúc: {{ $article->created_at }}</small>
            <hr>
            <div class="new-detail-content-child text-justify">
                <h6>Nội dung bài viết</h6>{!! $article->content !!}
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection
@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('article.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="article-title">Tiêu đề:</label>
                        <input type="text" class="form-control" placeholder="Nhập tiêu đề bài viết" id="article-title" name="article-title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung:</label>
                        <textarea class="form-control" id="content" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sort-order">Thứ tự hiển thị:</label>
                        <input type="number" class="form-control" placeholder="Nhập thứ tự xuất hiện" id="sort-order" name="sort-order" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection
@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mã khuyến mãi
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('promotion.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="promotion-name">Tên mã:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên mã" id="promotion-name" name="promotion-name" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Mã:</label>
                        <input type="text" class="form-control" placeholder="Nhập mã" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Trị giá:</label>
                        <input type="text" class="form-control" placeholder="Trị giá" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" class="form-control" placeholder="Số lượng" id="quantity" name="quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection
@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhà cung cấp
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('producer.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="producer-name">Tên nhà cung cấp:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="producer-name" name="producer-name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection
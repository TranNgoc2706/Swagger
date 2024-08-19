@extends('main')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">

            <div class="col-md-6">
                <div class="form-group">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="form-group">
                <label >Giá </label>
                <input type="number" id="price" name="price" value="{{old('price')}}">
            </div>
            <div class="form-group">
                <label for="menu"> ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </div>
</form>
@endsection
@include('alert')
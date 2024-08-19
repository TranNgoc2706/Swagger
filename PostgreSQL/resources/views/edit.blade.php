@extends('main')

@section('content')
<form action="" method="POST">
    @csrf
    <div class="card-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" id="name" name="name" value="{{$product->name}}" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="form-group">
                <label >Giá </label>
                <input type="number" id="price" name="price" value="{{$product->price}}" class="form-control">
            </div>  
            <div class="form-group">
                <label for="menu">ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload" >
                <div id="image_show">
                    <a href="" target="_blank">
                        <img src="{{$product->thumb}}" width="100px" alt="">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$product->thumb}}">
            </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">cập nhật sản phẩm</button>
    </div>
</form>
@endsection





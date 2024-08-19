@extends('main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px ">ID</th>
            <th>Tên sản phẩm</th>
            <th>giá </th>
            <th>update</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{ $product->updated_at }}</td>
            <td><a href="{{$product->thumb}}" target="_blank"> 
                <img src="{{$product->thumb}}" alt="" height="40px"> 
                </a>
            </td>
            <td>
                <a class="btn btn-primary btn-sm" href="/edit/{{ $product->id }}">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$product->id}},'/destroy');">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="pagination">
    {!! $products->links()!!}
</div>


@endsection

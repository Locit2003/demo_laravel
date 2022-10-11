@extends('layouts.admin');
@section('main')
<div class="container">
    <a href="{{route('create_product.index')}}" class="btn btn-success">Them San Pham</a>
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>anh</th>
                <th>status</th>
                <th>price</th>
                <th>sale</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $pro as $res)
            <tr>
                <td>{{ $res->name }}</td>
                <td><img width="100" src="{{ url('public/images') }}/{{$res->image}}" alt=""></td>
                <td>{{ $res->status == '1' ? 'hiển thị' : 'tạm ẩn' }}</td>
                <td>{{ $res->price }}</td>
                <td>{{ $res->sale_price }}</td>
                <td>
                    <a href="product/{{$res->id}}" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                    <a href="#" class="btn btn-info">Details</a>
                </td>
            </tr>
            
            @endforeach
        
        </tbody>
    </table>
    <div>{{ $pro->links() }}</div>
</div>
@stop
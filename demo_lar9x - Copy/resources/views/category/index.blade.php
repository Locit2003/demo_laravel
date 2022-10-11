@extends('layouts.admin')
@section('main')

<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{Session::get('success')}}</strong>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-error" role="alert">
            <strong>{{Session::get('error')}}</strong>
        </div>
    @endif

    <form action="{{ route('category.insert') }}" method="post" style="width:80%">
        @csrf
        <div class="form-group">
            <label for="">name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-check">
            <p><b>status</b></p>
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="1" checked>
            hiển thị
          </label>
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="0" checked>
            block
          </label>
        </div>
       
        <button type="submit">Them</button>
    </form>

    <table class="table" border="2" style="width:1000px;margin-top:50px;vertical-align: middle">
        <thead>
            <tr>
                <th>name</th>
                <th>satus</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $res)
                <tr>
                    <td>{{ $res->name }}</td>
                    <td>{{ $res->status == 1 ? 'hiển thị' : 'block' }}</td>
                    <td>
                        <form action="{{ route('category.delete',$res->id) }}" method="post">
                            @csrf @method("DELETE")
                            <a href="{{route('category.edit',$res->id)}}" class="btn btn-primary">edit</a>
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <div>{{ $cats->links() }}</div>
    </div>
</div>

@stop

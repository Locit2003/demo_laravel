@extends('layouts.admin');
@Section('main')
<div class="container">
    <form action="{{route('category.update',$cat->id)}}" method="post" style="width:80%">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="">name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                placeholder="" value="{{ $cat->name }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
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

        <button type="submit">Sửa</button>
    </form>
</div>

@stop
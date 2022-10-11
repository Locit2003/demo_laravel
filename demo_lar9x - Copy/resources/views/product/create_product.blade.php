@extends('layouts.admin');
@section('main')

    <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="">
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
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">ảnh</label>
                    <input type="file" class="form-control" name="image" id="" aria-describedby="helpId"
                        placeholder="">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">giá</label>
                    <input type="number" class="form-control" name="price" id="" aria-describedby="helpId"
                        placeholder="">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">giá sale</label>
                    <input type="number" class="form-control" name="sale_price" id="" aria-describedby="helpId"
                        placeholder="">
                    @error('sale_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <h5 for=""><b>category_id</b></h5>
                    <Select name="category_id">
                        @foreach ($cats as $res)
                            <option value="{{ $res->id }}">{{ $res->name }}</option>
                        @endforeach
                    </Select>
                </div>

            </div>
        </div>

        <button type="submit">Them</button>
    </form>
@stop

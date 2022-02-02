@extends('welcome')

@section('heading')
    <h2>Create Product</h2>
@endsection

@section('content')
    <form method="POST" action="{{ route('productStore') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" id="">
        </div>
        <div class="form-group">
            <label for="">Stock</label>
            <input type="number" class="form-control" min="1" placeholder="" name="quantity" id="">
        </div>
        <div class="form-group">
            <label for="">Rate</label>
            <input type="number" class="form-control" min="1" placeholder="" name="rate" id="">
        </div>
        <div class="form-group">
            <label for="">Brand</label>
            <select name="brand_id" class="form-control" id="">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <select name="category_id" class="form-control" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Product Image</label>
            <input type="file" class="form-control" name="image" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection

@extends('welcome')

@section('heading')
    <h2>Create Brand</h2>
@endsection

@section('content')
    <form method="POST" action="{{ route('productUpdate', $product->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" value="{{ $product->product_name }}" placeholder="Enter Product Name"
                name="product_name" id="">
        </div>
        <div class="form-group">
            <label for="">Stock</label>
            <input type="number" class="form-control" min="1" value="{{ $product->quantity }}" placeholder=""
                name="quantity" id="">
        </div>
        <div class="form-group">
            <label for="">Rate</label>
            <input type="number" class="form-control" min="1" value="{{ $product->rate }}" placeholder="" name="rate"
                id="">
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
        <!-- <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="form-control" id="selUser">
                <option value="0">Disable</option>
                <option value="1">Active</option>
            </select>
        </div> -->
        <div class="form-group">
            <label for="">Product Image</label>
            <input type="file" class="form-control" name="image" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection

@extends('welcome')

@section('heading')
    <h2>Product</h2> <a class="btn btn-primary" href="{{ route('productCreate') }}">Add Product</a>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Product Image</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Rate</th>
                <!-- <th>status</th> -->
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td><img height="60" width="85" src="{{ asset('storage/images/' . $product->image_path) }}" alt="">
                    </td>
                    <td>{{ $product->brand->brand_name }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>{{ $product->quantity - $ordered }}
                    </td>
                    <td>{{ $product->rate }}</td>
                    <!-- <td>{{ $product->status == 1 ? 'Active' : 'Disabled' }}</td> -->
                    <td><a class="btn btn-warning" href="{{ route('productEdit', $product->id) }}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{ route('productDelete', $product->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

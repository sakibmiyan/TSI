@extends('welcome')

@section('heading')
    <h2>Brands</h2> <a class="btn btn-primary" href="{{ route('brandCreate') }}">Add Brand</a>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
        <thead>
            <tr>
                <th>Brand</th>
                <!-- <th>status</th> -->
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->brand_name }}</td>
                    <!-- <td>{{ $brand->status == 1 ? 'Active' : 'Disabled' }}</td> -->
                    <td><a class="btn btn-warning" href="{{ route('brandEdit', $brand->id) }}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{ route('brandDelete', $brand->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

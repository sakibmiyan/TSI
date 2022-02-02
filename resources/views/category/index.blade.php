@extends('welcome')

@section('heading')
    <h2>Category</h2> <a class="btn btn-primary" href="{{ route('categoryCreate') }}">Add Category</a>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
        <thead>
            <tr>
                <th>Category</th>
                <!-- <th>status</th> -->
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <!-- <td>{{ $category->status == 1 ? 'Active' : 'Disabled' }}</td> -->
                    <td><a class="btn btn-warning" href="{{ route('categoryEdit', $category->id) }}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{ route('categoryDelete', $category->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

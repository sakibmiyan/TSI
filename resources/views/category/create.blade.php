@extends('welcome')

@section('heading')
    <h2>Create Category</h2>
@endsection

@section('content')
    <form method="POST" action="{{ route('categoryStore') }}">
        @csrf
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection

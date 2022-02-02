@extends('welcome')

@section('heading')
    <h2>Edit Category</h2>
@endsection

@section('content')

    <form method="POST" action="{{ route('categoryUpdate', $category->id) }}">
        @csrf
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" class="form-control" value="{{ $category->category_name }}"
                placeholder="Enter Category Name" name="category_name" id="">
        </div>
        <!-- <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="form-control" id="selUser">
                <option value="0">Disable</option>
                <option value="1">Active</option>
            </select>
        </div> -->
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection

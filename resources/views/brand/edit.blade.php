@extends('welcome')

@section('heading')
    <h2>Edit Brand</h2>
@endsection

@section('content')

    <form method="POST" action="{{ route('brandUpdate', $brand->id) }}">
        @csrf
        <div class="form-group">
            <label for="">Brand Name</label>
            <input type="text" class="form-control" value="{{ $brand->brand_name }}" placeholder="Enter Brand Name"
                name="brand" id="">
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

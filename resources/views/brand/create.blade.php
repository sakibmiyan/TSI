@extends('welcome')

@section('heading')
    <h2>Create Brand</h2>
@endsection

@section('content')
    <form method="POST" action="{{ route('brandStore') }}">
        @csrf
        <div class="form-group">
            <label for="">Brand Name</label>
            <input type="text" class="form-control" placeholder="Enter Brand Name" name="brand" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection

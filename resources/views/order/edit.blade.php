@extends('welcome')

@section('heading')
    <h2>Create Brand</h2>
@endsection

@section('content')
    <form method="POST" action="">
        @csrf
    </form>
@endsection

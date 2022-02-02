@extends('welcome')

@section('heading')
    <h2>Report</h2>
@endsection

@section('content')
    <form method="POST" action="{{ route('reportView') }}">
        @csrf
        <label for="">From Date</label>
        <input type="date" name="date1" class="form-control" required id="">
        <label for="">To Date</label>
        <input type="date" name="date2" class="form-control" required id="">
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection

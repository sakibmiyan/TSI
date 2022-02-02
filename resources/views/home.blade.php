@extends('welcome')

@section('heading')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="text-muted">Total Product</h5>
            <div class="metric-value d-inline-block">
                <h1 class="mb-1">{{ $cp }}</h1>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="text-muted">Total Revenue</h5>
            <div class="metric-value d-inline-block">
                <h1 class="mb-1">{{ $oa }}</h1>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <h5 style="color: red;" class="text-muted">Low Warning</h5>
            <div class="metric-value d-inline-block">
                <h1 style="color: red;" class="mb-1">{{ $lw }}</h1>
            </div>
        </div>

    </div>

@endsection

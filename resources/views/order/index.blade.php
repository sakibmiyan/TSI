@extends('welcome')

@section('heading')
    <h2>Order List</h2> <a class="btn btn-warning" href="{{ route('orderCreate') }}">Create Order</a>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
        <thead>
            <tr>
                <th>Order No</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Payment Type</th>
                <th>Status</th>
                <th>Action</th>
                <th>Invoice</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->contact }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->payment_type }}</td>
                    <td>{{ $order->status == 1 ? 'Accepted' : 'Pending' }}</td>
                    <td><a role="button" href="{{ route('orderDelete', $order->id) }}"><button
                                class="btn btn-link text-danger"><i class="fas fa-times"></i></button></a></td>
                    <td><a class="btn btn-success" href="{{ route('invoice', $order->id) }}">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

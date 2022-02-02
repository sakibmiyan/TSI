@extends('welcome')

@section('heading')
    <h2>Invoice</h2>
@endsection

@section('content')
    <div class="col-md-12">
        <h3>Name:{{ $order->customer_name }}</h3> <br>
    </div>
    <div class="col-md-12">
        <h3>Contact:{{ $order->contact }}</h3><br>
    </div>
    <div class="col-md-12">
        <h3>Email:{{ $order->email }}</h3><br>
    </div>
    <div class="col-md-12">
        <h3>Address:{{ $order->address }}</h3><br>
    </div>
    <br>
    <br>
    <h4 align='center'>Order Information</h4>
    <table class="table table-display table-striped table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Sub-total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            ?>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->rate }}Tk/-</td>
                    <td>{{ $item->rate * $item->quantity }}Tk/-</td>
                </tr>
                <?php
                $total += $item['rate'] * $item['quantity'];
                ?>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ $total }} Tk/-</td>
            </tr>
        </tfoot>
    </table>
    <button class="btn btn-success" onclick="window.print()">Print Invoice</button>
@endsection

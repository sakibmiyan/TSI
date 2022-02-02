@extends('welcome')

@section('heading')
    <h2>Checkout </h2>
@endsection

@section('content')
    <form method="POST" action="{{ route('confirmCheckout') }}">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Enter Customer Name" name="customer_name" id="">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" placeholder="Ex: absds@email.com" class="form-control" name="email" id="">
        </div>
        <div class="mb-3">
            <label for="password">Contact</label>
            <input type="tel" class="form-control" placeholder="Ex: 01345325662" name="contact" id="">
        </div>
        <div class="mb-3">
            <label for="password">Shipping Address</label>
            <textarea name="address" placeholder="Enter Shipping Address here..." class="form-control" id="" cols="30"
                rows="13"></textarea>
        </div>
        <div class="mb-3">
            <label for="password">Pay Via</label>
            <select name="payment_type" class="form-control" id="">
                <option value="Cash">Cash</option>
                <option value="Bkash">Bkash</option>
                <option value="Bank Transaction">Bank Transaction</option>
            </select>
        </div>
        <div class="form-group">
            <div class="float-left">
                <button type="submit" class="btn btn-outline-success">Place Order</button>
            </div>
        </div>
    </form>
@endsection

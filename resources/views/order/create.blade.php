@extends('welcome')

@section('heading')
    <h2>Create Order</h2>
@endsection

@section('content')
    <div class="col-md-6 row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 align='center'>{{ $product->product_name }}</h5>
                        <img height="60" width="75" src="{{ asset('storage/images/' . $product->image_path) }}" alt="">
                    </div>
                    <a align='center' class="btn btn-success" href="{{ route('addToCart', $product->id) }}"><i
                            class="fas fa-cart-plus"></i>Add to Cart</a> <br>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-6">
        <h3>Cart</h3>
        <table class="table table-striped table-display table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (session('cartItems'))
                    @foreach (session('cartItems') as $key => $value)
                        <tr>
                            <td>
                                <img height="60" width="75" src="{{ asset('storage/images/' . $value['image_path']) }}"
                                    class="img-fluid">
                                {{ $value['name'] }}
                            </td>
                            <td>
                                {{ $value['rate'] }}
                            </td>
                            <td>
                                <form action="{{ route('update.cart', ['id' => $key]) }}" method="POST">
                                    @csrf
                                    <select name="quantity" id="quantity" onchange="this.form.submit()">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}"
                                                {{ $value['quantity'] == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </form>
                            </td>
                            <td>
                                {{ $value['rate'] * $value['quantity'] }}
                            </td>
                            <td>
                                <a role="button" href="{{ route('removeCart', $key) }}"><button
                                        class="btn btn-link text-danger"><i class="fas fa-times"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td align="center" colspan="6">
                            <p>No Item In Cart</p>
                        </td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        @if (session('cartItems'))
            <div class="col-12 text-right">
                <a href="{{ route('checkOut') }}" class="btn btn-outline-success">Checkout</a>
            </div>
        @endif
    </div>
@endsection

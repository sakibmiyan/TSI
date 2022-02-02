<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', [
            'orders' => $orders
        ]);
    }
    public function create()
    {
        $products = Product::all();
        return view('order.create', [
            'products' => $products
        ]);
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cartItems = session()->get('cartItems', []);
        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity']++;
        } else {
            $cartItems[$id] = [
                'image_path' => $product->image_path,
                'name' => $product->product_name,
                'rate' => $product->rate,
                'quantity' => 1
            ];
        }
        session()->put('cartItems', $cartItems);
        return redirect()->back();
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cartItems = session()->get('cartItems');
            if (isset($cartItems[$request->id])) {
                unset($cartItems[$request->id]);
                session()->put('cartItems', $cartItems);
            }
            // dd($cartItems);
            return redirect()->back()->with('success', 'Product Deleted!!!');
        }
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cartItems = session()->get('cartItems');
            $cartItems[$request->id]["quantity"] = $request->quantity;
            session()->put('cartItems', $cartItems);
        }
        return redirect()->back()->with('success', 'Cart quantity Updated!');
    }
    public function confirmCheckout(Request $request)
    {
        // dd($request->all());
        // $user_id = Auth::user()->id;
        $order = Order::latest()->first();
        $order_id = $order->id + 1;
        $total = 0;
        $cartItems = session()->get('cartItems');
        foreach ($cartItems as $key => $value) {
            $total += $value['quantity'] * $value['rate'];
        }
        Order::create([
            'id' => $order_id,
            'customer_name' => $request->input('customer_name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'amount' => $total,
            'status' => 1,
            'payment_type' => $request->input('payment_type')
        ]);
        foreach ($cartItems as $key => $value) {
            OrderItem::create([
                'product_id' => $key,
                'quantity' => $value['quantity'],
                'rate' => $value['rate'],
                'order_id' => $order_id
            ]);
        }
        return redirect()->route('order')->with('success', 'Order Placed Successfully');
    }
    public function checkout()
    {
        return view('order.checkout');
    }
    public function destroy($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->delete();
        return redirect()->back();
    }
    public function invoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('invoice', [
            'order' => $order
        ]);
    }
    public function report()
    {
        return view('report');
    }
    public function reportView(Request $request)
    {
        $from = $request->input('date1');
        $to = $request->input('date2');
        $orders = Order::whereBetween('created_at', [$request->input('date1'), $request->input('date2')])->get();
        // dd($orders);
        return view('viewReport', [
            'orders' => $orders,
            'from' => $from,
            'to' => $to
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $cp = 0;
        $lw = 0;
        foreach ($products as $product) {
            $cp++;
            $qty = $product->quantity;
            foreach ($product->orderItems as $item) {
                $qty -= $item->quantity;
            }
            if ($qty <= 3) {
                $lw++;
            }
        }
        $orders = Order::all();
        $oa = 0;
        foreach ($orders as $order) {
            $oa += $order->amount;
        }
        return view('home', [
            'cp' => $cp,
            'oa' => $oa,
            'lw' => $lw
        ]);
    }
    public function addUser()
    {
        $employees = User::where('role', '=', 0)->get();
        return view('employee', [
            'employees' => $employees
        ]);
    }
    public function storeUser(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 0
        ]);
        return redirect()->back();
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}

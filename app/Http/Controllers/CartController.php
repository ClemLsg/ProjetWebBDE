<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function _construct(){
        $this->middleware('Auth');
    }

    public function index()
    {
        $cart = Auth::user()->cart;
        $total = 0;

        foreach ($cart as $item) {
            $price = ($item->cart->quantity) * ($item->price);
            $total = $total + $price;
        }

        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $user = Auth::user();

        $user->cart()->attach($id, array('quantity' => $request->input('quantity')));

        return redirect()->back();
    }

    public function remove($id)
    {
        $user = Auth::user();

        $user->cart()->detach($id);

        return redirect()->back();
    }

    public function order(){
        $cart = Auth::user()->cart;

        $user = Auth::user();

        $order = Order::create([
            'status' => 0
        ]);

        $user->orders()->attach($order->id);

        foreach ($cart as $prod){
            $user->cart()->detach($prod->id);
            $order->products()->attach($prod->id, array('quantity' => $prod->cart->quantity));
        }

        return redirect()->back();

    }
}

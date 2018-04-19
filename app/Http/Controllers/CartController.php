<?php

namespace App\Http\Controllers;

use App\Notifications\CommandValid;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Auth::user()->cart;
        $total = 0;

        if($cart->count() == 0){
            $validate = 0;
        } else {
            $validate = 1;
        }

        foreach ($cart as $item) {
            $price = ($item->cart->quantity) * ($item->price);
            $total = $total + $price;
        }

        return view('cart', compact('cart', 'total','validate'));
    }

    public function add(Request $request, $id)
    {
        $user = Auth::user();
        $cart = Auth::user()->cart;
        $loop = 0;

        if($cart->count() == 0){
            $user->cart()->attach($id, array('quantity' => $request->input('quantity')));
        } else {
            foreach ($cart as $item) {
                $array[$loop] = $item->id;
                $loop++;
            }

            if(in_array($id, $array)){
                $prod = Auth::user()->cart->where('id', $id)->first();
                $quantity = $prod->cart->quantity + $request->input('quantity');
                $user->cart()->updateExistingPivot($id , ['quantity' => $quantity]);;
            } else {
                $user->cart()->attach($id, array('quantity' => $request->input('quantity')));
            }
        }

        return redirect()->back()->with("success","Votre article a été ajouté au panier");
    }

    public function remove($id)
    {
        $user = Auth::user();

        $user->cart()->detach($id);

        return redirect()->back();
    }

    public function order($type){
        $cart = Auth::user()->cart;

        $user = Auth::user();

        $order = Order::create([
            'status' => $type
        ]);

        $user->orders()->save($order);

        foreach ($cart as $prod){
            $order->products()->attach($prod->id, array('quantity' => $prod->cart->quantity));
            $user->cart()->detach($prod->id);
        }
        $user->notify(new CommandValid());
        return redirect()->route('index');

    }
}

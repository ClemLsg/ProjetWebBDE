<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class DashcommandController extends Controller
{
    public function index()
    {
        $commands = Order::where("status",">","0")->get();
        return view('dashcommand', compact('commands'));
    }

    public function changeStatus(request $request, $id){
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back();

    }
}

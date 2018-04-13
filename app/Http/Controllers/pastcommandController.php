<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class pastcommandController extends Controller
{
    public function index()
    {
        $commands = Order::where("status","=","0")->get();
        return view('pastcommand', compact('commands'));

    }
}

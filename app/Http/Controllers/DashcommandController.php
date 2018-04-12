<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashcommandController extends Controller
{
    public function index()
    {
        return view('dashcommand');
    }
}

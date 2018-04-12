<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pastcommandController extends Controller
{
    public function index()
    {
        return view('pastcommand');
    }
}

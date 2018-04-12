<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageeventController extends Controller
{
    public function index()
    {
        return view('manageevent');
    }
}

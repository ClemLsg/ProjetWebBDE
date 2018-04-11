<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdeaboxController extends Controller
{
    public function index()
    {
        return view('ideabox');
    }
}

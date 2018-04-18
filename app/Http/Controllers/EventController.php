<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index($id)
    {
        $event = Activitie::find($id);

        return view('event', compact('event'));
    }
}

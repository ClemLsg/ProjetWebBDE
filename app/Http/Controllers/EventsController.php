<?php

namespace App\Http\Controllers;

use App\Activitie;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //
    public function index()
    {
        $events = Activitie::all();

        return view('events', compact('events'));
    }

    public function jsonUrl(){
        $events = Activitie::all();
        $loop = 1;
        foreach ($events as $ev){
            $url[$loop] = $ev->pictures()->first()->url;
            $loop++;
        }

        return response()->json($url);
    }
}

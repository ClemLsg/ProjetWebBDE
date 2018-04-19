<?php

namespace App\Http\Controllers;

use App\Activitie;
use Illuminate\Http\Request;

class partipateeventsController extends Controller
{
    public function index($id)
    {
        $event = Activitie::find($id);
        $participant = $event->participants;

        return view('partipateevents', compact('participant', 'event'));
    }
}

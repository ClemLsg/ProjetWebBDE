<?php

namespace App\Http\Controllers;

use App\Activitie;
use App\IdeaBox;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class IndexController extends Controller
{

    public function index()
    {
        $firstevent = Activitie::all()->sortByDesc('date')->take(1)->first();
        $latestevent = Activitie::all()->sortByDesc('created_at')->take(1)->first();
        $bestboxes = IdeaBox::with('votes')->get()->sortByDesc(function($bestboxes){
            return $bestboxes->votes->count();
        })->take(3);

        return view('index', compact('firstevent', 'bestboxes','latestevent'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Activitie;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class EventController extends Controller
{
    //
    public function index($id)
    {
        $event = Activitie::find($id);
        $firstparticipants = Activitie::find($id)->participants->take('6');

        return view('event', compact('event', 'firstparticipants'));
    }

    public function comment(request $request){
        $request->all();
            $comment = new Comment();
            $comment->content = $request->input('content');
            $comment->picture_id = $request->input('postid');
            $comment->save();

            Auth::user()->comments()->save($comment);

            return response()->json(['responseText' => 'Success!'], 200);
        }

    public function like(){

    }

    public function sub($id){

    }

    public function postImg($id){

    }

    public function reportImg($id){

    }
}

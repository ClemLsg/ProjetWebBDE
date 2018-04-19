<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class manageaccountController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('manageaccount', compact("users"));
    }

    public function addUser(request $request){

        $validator = Validator::make($request->all(),[
            'firstname' => 'required|string',
            'email' => 'required|email',
            'surname' => 'required|string',
            'customRadioInline1' => 'required',
        ]);

        if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->input('firstname'),
            'email' => $request->input('email'),
            'password' => Hash::make('password'),
            'surname' => $request->input('surname'),
            'rank' => intval($request->input('customRadioInline1'))
        ]);

        return redirect()->back()->with('success', 'Utilisateur bien créé.');
    }

    public function updateUser(request $request, $id){

        $user = User::find($id);

        $user->name = $request->input('firstname');
        $user->surname = $request->input('surname');
        $user->rank = intval($request->input('customRadioInline1'));
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur bien modifié.');

    }
}

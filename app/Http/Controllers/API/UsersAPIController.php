<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsersAPIController extends BaseAPIController
{
    /**
     * Display a listing of all users by querying through the User model, without displaying the passwords.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = User::all();

        return $this->sendPositiveResponse($user, 'All users retrieved successfully.', 200);
    }

    /**
     * Store a newly created user in the database.
     * Use of the Validator facade to make sure that the data sent by the user are correct.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'surname' => 'required',
            'rank' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('The content of the request does not satisfy the validator.', 412);
        }

        $user = User::create($input);

        return $this->sendPositiveResponse($user->toArray(),'User created successfully.', 201);
    }

    /**
     * Display a specific user by querying through the User model.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);

        if(is_null($user)){
            return $this->sendError('User not found.',404);
        }

        return $this->sendPositiveResponse($user->toArray(),'The wanted user has been retrieved successfully.',200);
    }
}

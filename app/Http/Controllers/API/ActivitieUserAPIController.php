<?php

namespace App\Http\Controllers\API;

use App\Activitie;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ActivitieUserAPIController extends BaseAPIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ActivityList = Activitie::pluck('id');

        $final = array();

        foreach($ActivityList as $id){
            $ActivityName = Activitie::find($id, ['name']);
            $ActivityUsers = DB::table('activitie_user')->where('activitie_id','=', $id)->get(['user_id']);

            $result = array(array('Activity_name' => $ActivityName->name, 'Activity_id' => $id));
            foreach($ActivityUsers as $ActivityUser){
                $UserName = User::find($ActivityUser->user_id, ['name']);
                array_push($result, $UserName);
            }

            array_push($final, $result);
        }

        return $this->sendPositiveResponse($final, 'List of users well retrieved.', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'activitie_id' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('The content of the request does not satisfy the validator.', 412);
        }

        $activityUser = DB::table('activitie_user')->insert($input);

        return $this->sendPositiveResponse($activityUser,'The participation of the user to the activity has been registered.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ActivityName = Activitie::find($id, ['name']);
        $ActivityUsers = DB::table('activitie_user')->where('activitie_id','=', $id)->get(['user_id']);

        $result = array(array('Activity_name' => $ActivityName->name, 'Activity_id' => $id));
        foreach($ActivityUsers as $ActivityUser){
            $UserName = User::find($ActivityUser->user_id, ['name']);
            array_push($result, $UserName);
        }

        return $this->sendPositiveResponse($result, 'List of users well retrieved.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
           'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation error.',412);
        }

        $result = DB::table('activitie_user')->where('activitie_id', '=', $id)->where('user_id', '=', $input['user_id'])->delete();
        return $this->sendPositiveResponse($input, 'Picture deleted successfully.', 200);
    }
}

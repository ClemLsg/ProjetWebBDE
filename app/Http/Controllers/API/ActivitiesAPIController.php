<?php

namespace App\Http\Controllers\API;

use App\Activitie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ActivitiesAPIController extends BaseAPIController
{
    /**
     * Display a listing of all activities by querying through the activity model.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $activity = Activitie::all();

        return $this->sendPositiveResponse($activity, 'All activities have been retrieved successfully.', 200);
    }

    /**
     * Store a newly created activity in the database.
     * Use of the Validator facade to make sure that the data sent by the user are correct.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'description' => 'required',
            'name' => 'required',
            'recurrent' => 'required',
            'price' => 'required',
            'date' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('The content of the request does not satisfy the validator.', 412);
        }

        $activity = Activitie::create($input);

        return $this->sendPositiveResponse($activity->toArray(),'Activity created successfully.', 201);
    }

    /**
     * Display a specific activity by querying through the activity model.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $activity = Activitie::find($id);

        if(is_null($activity)){
            return $this->sendError('Activity not found.',404);
        }

        return $this->sendPositiveResponse($activity->toArray(),'The wanted activity has been retrieved successfully.',200);
    }

    /**
     * Update the specified activity in the database.
     * Use of the Validator facade to make sure that the data sent by the user are correct.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'description' => 'required',
            'name' => 'required',
            'recurrent' => 'required',
            'price' => 'required',
            'date' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', 412);
        }

        $activity = Activitie::find($id);
        if (is_null($activity)) {
            return $this->sendError('Activity not found.', 404);
        }


        $activity->description = $input['description'];
        $activity->name = $input['name'];
        $activity->recurrent = $input['recurrent'];
        $activity->price = $input['price'];
        $activity->date = $input['date'];
        $activity->user_id = $input['user_id'];
        $activity->save();


        return $this->sendPositiveResponse($activity->toArray(), 'Activity updated successfully.', 200);
    }

    /**
     * Remove the specified activity from the database.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $activity = Activitie::find($id);

        if(is_null($activity)){
            return $this->sendError('Activity not found', 404);
        }

        $activity->delete();

        return $this->sendPositiveResponse($id, 'Activity deleted successfully.', 200);
    }
}

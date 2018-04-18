<?php

namespace App\Http\Controllers\API;

use App\IdeaBox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IdeaBoxAPIController extends BaseAPIController
{
    /**
     * Display a listing of all ideas by querying through the IdeaBox model.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $ideaBox = IdeaBox::all();

        return $this->sendPositiveResponse($ideaBox->toArray(), 'All ideas well returned.', 200);
    }

    /**
     * Store a newly created idea in the database.
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
            'desc' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('The content of the request does not satisfy the validator.', 412);
        }

        $ideaBox = IdeaBox::create($input);

        return $this->sendPositiveResponse($ideaBox->toArray(),'Idea created successfully.', 201);
    }

    /**
     * Display a specific idea by querying through the IdeaBox model.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $ideaBox = IdeaBox::find($id);

        if(is_null($ideaBox)){
            $this->sendError('Idea not found', 404);
        }

        return $this->sendPositiveResponse($ideaBox, 'Idea well returned', 200);
    }

    /**
     * Update the specified idea in the database.
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
            'name' => 'required',
            'desc' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', 412);
        }

        $ideaBox = IdeaBox::find($id);
        if (is_null($ideaBox)) {
            return $this->sendError('Idea not found.', 404);
        }


        $ideaBox->name = $input['name'];
        $ideaBox->desc = $input['desc'];
        $ideaBox->user_id = $input['user_id'];
        $ideaBox->save();


        return $this->sendPositiveResponse($ideaBox->toArray(), 'Idea updated successfully.', 200);
    }

    /**
     * Remove the specified idea from the database.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $ideaBox = IdeaBox::find($id);

        if(is_null($ideaBox)){
            return $this->sendError('Idea not found', 404);
        }

        $ideaBox->delete();

        return $this->sendPositiveResponse($id, 'Idea deleted successfully.', 200);
    }
}

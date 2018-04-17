<?php

namespace App\Http\Controllers\API;

use App\IdeaBox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IdeaBoxAPIController extends BaseAPIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideaBox = IdeaBox::all();

        return $this->sendPositiveResponse($ideaBox->toArray(), 'All ideas well returned.', 200);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

<?php

namespace App\Http\Controllers\API;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PictureAPIController extends BaseAPIController
{
    /**
     * Display a listing of the pictures in a JSON Format.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::all();

        return $this->sendPositiveResponse($pictures, 'All pictures have been retrieved successfully.', 200);
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
            'url' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('The content of the request does not satisfy the validator.', 412);
        }

        $picture = Picture::create($input);

        return $this->sendPositiveResponse($picture->toArray(),'Picture created successfully.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $picture = Picture::find($id);

        if(is_null($picture)){
            return $this->sendError('Picture not found.',404);
        }

        return $this->sendPositiveResponse($picture->toArray(),'The wanted picture has been retrieved successfully.',200);
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
            'url' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', 412);
        }

        $picture = Picture::find($id);
        if (is_null($picture)) {
            return $this->sendError('Picture not found.', 404);
        }


        $picture->url = $input['url'];
        $picture->save();


        return $this->sendPositiveResponse($picture->toArray(), 'Picture updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = Picture::find($id);

        if(is_null($picture)){
            return $this->sendError('Picture not found', 404);
        }

        $picture->delete();

        return $this->sendPositiveResponse($id, 'Picture deleted successfully.', 200);
    }
}

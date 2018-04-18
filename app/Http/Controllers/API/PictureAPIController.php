<?php

namespace App\Http\Controllers\API;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PictureAPIController extends BaseAPIController
{
    /**
     * Display a listing of all pictures by querying through the Picture model.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $pictures = Picture::all();

        return $this->sendPositiveResponse($pictures, 'All pictures have been retrieved successfully.', 200);
    }

    /**
     * Store a newly created picture in the database.
     * Use of the Validator facade to make sure that the data sent by the user are correct.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
     * Display a specific picture by querying through the Picture model.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
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
     * Update the specified picture in the database.
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
     * Remove the specified picture from the database.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
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

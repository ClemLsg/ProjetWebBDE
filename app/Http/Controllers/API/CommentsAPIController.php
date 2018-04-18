<?php

namespace App\Http\Controllers\API;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentsAPIController extends BaseAPIController
{
    /**
     * Display a listing of all comments by querying through the comment model.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $comment = Comment::All();

        return $this->sendPositiveResponse($comment, 'All comments have been retrieved correctly.', 200);
    }

    /**
     * Store a newly created comment in the database.
     * Use of the Validator facade to make sure that the data sent by the user are correct.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'content' => 'required',
            'user_id' => 'required',
            'picture_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('The content of the request does not satisfy the validator.', 412);
        }

        $comment = Comment::create($input);

        return $this->sendPositiveResponse($comment->toArray(),'Comment created successfully.', 201);
    }

    /**
     * Display a specific comment by querying through the comment model.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        if(is_null($comment)){
            return $this->sendError('Comment not found.', 404);
        }

        return $this->sendPositiveResponse($comment->toArray(), 'Comment retrieved correctly.', 200);
    }

    /**
     * Update the specified comment in the database.
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
            'content' => 'required',
            'user_id' => 'required',
            'picture_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', 412);
        }

        $comment = Comment::find($id);
        if (is_null($comment)) {
            return $this->sendError('Comment not found.', 404);
        }


        $comment->content = $input['content'];
        $comment->user_id = $input['user_id'];
        $comment->picture_id = $input['picture_id'];
        $comment->save();


        return $this->sendPositiveResponse($comment->toArray(), 'Comment updated successfully.', 200);
    }

    /**
     * Remove the specified comment from the database.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if(is_null($comment)){
            return $this->sendError('Comment not found', 404);
        }

        $comment->delete();

        return $this->sendPositiveResponse($id, 'Comment deleted successfully.', 200);
    }
}

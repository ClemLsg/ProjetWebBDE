<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseAPIController extends Controller
{
    /**
     * Create a personalized format of JSON response in case of success.
     *
     * @param $result
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function sendPositiveResponse($result, $message, $code){
        $response = array(
            'success' => true,
            'data' => $result,
            'message' => $message
        );

        return response()->json($response, $code);
    }

    /**
     * Create a personalized format of JSON response in case of error.
     *
     * @param $error
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $code){
        $response = array(
            'success' => false,
            'message' => $error
        );

        return response()->json($response, $code);
    }
}

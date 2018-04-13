<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseAPIController extends Controller
{
    public function sendPositiveResponse($result, $message, $code){
        $response = array(
            'success' => true,
            'data' => $result,
            'message' => $message
        );

        return response()->json($response, $code);
    }

    public function sendError($error, $code){
        $response = array(
            'success' => false,
            'message' => $error
        );

        return response()->json($response, $code);
    }
}

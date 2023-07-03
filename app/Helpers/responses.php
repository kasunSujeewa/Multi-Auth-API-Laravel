<?php

use Illuminate\Http\Response;

function successResponse($message, $data, $statusCode)
 {

    $response = [
        'success' => true,
        'data'    => $data,
        'message' => $message,
    ];

    return response()->json($response, $statusCode);
}

function errorResponse($message, $data, $statusCode)
{

    $response = [
        'success' => false,
        'data'    => $data,
        'message' => $message,
    ];

    return response()->json($response, $statusCode);
}
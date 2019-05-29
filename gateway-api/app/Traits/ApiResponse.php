<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    /**
     * Build the success response
     *
     * @param  string|array $data
     * @param  int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function success_api($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build the error response
     *
     * @param  string|array $error
     * @param  int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function error_api($error, $code)
    {
        return response()->json(['error' => $error, 'code' => $code], $code);
    }

    /**
     * Build the error message
     *
     * @param  string|array $message
     * @param  int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function error_message($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}

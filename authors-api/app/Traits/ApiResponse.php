<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    /**
     * Build the success response
     *
     * @param  array $data
     * @param  int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function success_api($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
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
}

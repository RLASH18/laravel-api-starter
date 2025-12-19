<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    /**
     * Return a successful JSON API response.
     *
     * @param mixed  $data
     * @param string $message
     * @param int    $code
     * @return JsonResponse
     */
    protected function success(mixed $data = null, string $message = 'success', int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    /**
     * Return an error JSON API response.
     *
     * @param string $message
     * @param int    $code
     * @param mixed  $data
     * @return JsonResponse
     */
    protected function error(string $message, int $code = Response::HTTP_BAD_REQUEST, mixed $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }
}

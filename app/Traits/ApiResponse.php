<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a successful JSON API response.
     *
     * @param mixed  $data
     * @param string $message
     * @return JsonResponse
     */
    protected function success(mixed $data, string $message = 'OK'): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * Return an error JSON API response.
     *
     * @param string $message
     * @param int    $code
     * @return JsonResponse
     */
    protected function error(string $message, int $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }
}

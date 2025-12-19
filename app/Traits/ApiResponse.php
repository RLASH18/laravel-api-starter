<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    /**
     * Return a successful JSON response.
     *
     * @param mixed  $data
     * @param string $message
     * @param int    $code
     * @return JsonResponse
     */
    protected function success(mixed $data = null, string $message = 'Success', int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param string $message
     * @param int    $code
     * @param mixed  $data
     * @return JsonResponse
     */
    protected function error(string $message = 'Error', int $code = Response::HTTP_BAD_REQUEST, mixed $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    /**
     * Return a 201 Created response.
     *
     * @param mixed  $data
     * @param string $message
     * @return JsonResponse
     */
    protected function created(mixed $data = null, string $message = 'Resource created'): JsonResponse
    {
        return $this->success($data, $message, Response::HTTP_CREATED);
    }

    /**
     * Return a 204 No Content response.
     *
     * @param string $message
     * @return JsonResponse
     */
    protected function deleted(string $message = 'Resource deleted'): JsonResponse
    {
        return $this->success(null, $message, Response::HTTP_NO_CONTENT);
    }

    /**
     * Return a 404 Not Found response.
     *
     * @param string $message
     * @return JsonResponse
     */
    protected function notFound(string $message = 'Resource not found'): JsonResponse
    {
        return $this->error($message, Response::HTTP_NOT_FOUND);
    }
}

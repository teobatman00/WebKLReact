<?php

namespace App\Traits;

trait ApiResponser
{
    private function baseResponse(bool $success, string $message, $data, int $code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function successResponse($data, string $message): \Illuminate\Http\JsonResponse
    {
        return $this->baseResponse(true, $message, $data, 200);
    }

    protected function badRequestResponse($data, string $message): \Illuminate\Http\JsonResponse
    {
        return $this->baseResponse(false, $message, $data, 400);
    }

    protected function notFoundResponse($data, string $message): \Illuminate\Http\JsonResponse
    {
        return $this->baseResponse(false, $message, $data, 404);
    }

    protected function serverErrorResponse($data, string $message): \Illuminate\Http\JsonResponse
    {
        return $this->baseResponse(false, $message, $data, 500);
    }

    protected function unauthorizedResponse($data, string $message): \Illuminate\Http\JsonResponse
    {
        return $this->baseResponse(false, $message, $data, 401);
    }
}

<?php

namespace App\Traits\Api\Responses;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function success(array $data = [],string $message = null,int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message ?? 'OK',
            'data' => $data ?? '',
            'code' => $code
        ] , $code);
    }
    protected function error(int $code , array $data = [] ,string $message = null): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message ?? 'مشکلی پیش آمده که باید بررسی شود',
            'data' => $data,
            'code' => $code
        ] , $code);
    }

}

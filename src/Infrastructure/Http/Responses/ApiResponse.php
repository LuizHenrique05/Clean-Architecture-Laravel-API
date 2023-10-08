<?php

declare(strict_types=1);

namespace Infrastructure\Http\Responses;

use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class ApiResponse
{
    private static array $headers = [
        'Content-type' => 'application/vnd.api+json',
        'X-Awesome' => 'Yoooo'
    ];

    public static function handle($data, null|int $status = null, array $headers = []) : JsonResponse
    {
        return new JsonResponse(
            data: $data,
            status: $status ?? Http::OK,
            headers: array_merge(static::$headers, $headers)
        );
    }
}
<?php

namespace Domain\Shared\Enums;

use Domain\Shared\Data\APIResponseData;
use Illuminate\Http\JsonResponse;

enum APIResponseEnum: int
{
    case SUCCESS = 200;
    case CREATED = 201;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case UNPROCESSABLE_ENTITY = 422;
    case INTERNAL_SERVER_ERROR = 500;

    public function generate(APIResponseData $response): JsonResponse
    {
        $result = [
            "status" => $response->status,
            "message" => $response->message ?? match ($this) {
                self::SUCCESS => "Success! Your request has safely landed back to Earth.",
                self::CREATED => "New entity launched into the cosmos.",
                self::BAD_REQUEST => "Your request veered off course and couldn't escape Earth's gravity!",
                self::UNAUTHORIZED => "Your credentials don't pass the cosmic gatekeeper!",
                self::FORBIDDEN => "Your request can't travel beyond the space-time boundary!",
                self::NOT_FOUND => "The data you're seeking is beyond the bounds of space!",
                self::UNPROCESSABLE_ENTITY => "Data anomaly detected. Unable to process your request in this dimension!",
                self::INTERNAL_SERVER_ERROR => "Galactic disruption. An unexpected cosmic event occurred!",
            },
            "meta" => $response->meta,
        ];

        if (!empty($response->data)) {
            $result['data'] = $response->data;
        }

        if (!empty($response->errors)) {
            $result['errors'] = $response->errors;
        }

        if (!empty($response->pagination)) {
            $result['pagination'] = $response->pagination;
        }

        return response()->json($result)->setStatusCode($this->value);
    }
}

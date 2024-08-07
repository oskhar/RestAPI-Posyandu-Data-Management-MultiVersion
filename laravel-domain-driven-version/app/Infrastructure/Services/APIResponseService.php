<?php

namespace App\Infrastructure\Services;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\API\Enums\APIStatusEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIResponseService
{
    protected Request $request;

    /**
     * Create a new service instance.
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Generate a JSON response.
     *
     * @param APIResponseData $response
     * @param APIStatusEnum $status
     * @return JsonResponse
     */
    public function __invoke(APIResponseData $response, ?APIStatusEnum $status = APIStatusEnum::SUCCESS): JsonResponse
    {
        $result = [
            "status" => $response->status ?? true,
            "message" => $response->message ?? match ($status) {
                APIStatusEnum::SUCCESS => "Success! Your request has safely landed back to Earth.",
                APIStatusEnum::CREATED => "New entity launched into the cosmos.",
                APIStatusEnum::BAD_REQUEST => "Your request veered off course and couldn't escape Earth's gravity!",
                APIStatusEnum::UNAUTHORIZED => "Your credentials don't pass the cosmic gatekeeper!",
                APIStatusEnum::FORBIDDEN => "Your request can't travel beyond the space-time boundary!",
                APIStatusEnum::NOT_FOUND => "The data you're seeking is beyond the bounds of space!",
                APIStatusEnum::UNPROCESSABLE_ENTITY => "Data anomaly detected. Unable to process your request in this dimension!",
                APIStatusEnum::INTERNAL_SERVER_ERROR => "Galactic disruption. An unexpected cosmic event occurred!",
            },
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

        $result = [
            ...$result,
            "meta" => $response->meta ?? [
                "request_id" => $this->request->header('X-Request-ID', uniqid()),
                "response_size" => strlen(json_encode($result))
            ]
        ];

        return response()->json($result)->setStatusCode($status->value);
    }
}

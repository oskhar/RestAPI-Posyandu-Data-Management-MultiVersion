<?php

namespace App\Infrastructure\Services;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\API\Enums\APIStatusEnum;
use Domain\Shared\Data\ResponseMetaData;
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
     * @param APIStatusEnum $status
     * @param APIResponseData $response
     * @return JsonResponse
     */
    public function execute(APIResponseData $response, APIStatusEnum $status): JsonResponse
    {
        $result = [
            "status" => $response->status,
            "message" => $response->message ?? $this->getDefaultMessage($status),
            "meta" => $response->meta ?? ResponseMetaData::from([
                "request_id" => $this->request->header('X-Request-ID'),
                "response_size" => $this->request->header('X-Response-Size')
            ]),
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

        return response()->json($result)->setStatusCode($status->value);
    }

    /**
     * Get the default message based on the status.
     *
     * @param APIStatusEnum $status
     * @return string
     */
    protected function getDefaultMessage(APIStatusEnum $status): string
    {
        return match ($status) {
            APIStatusEnum::SUCCESS => "Success! Your request has safely landed back to Earth.",
            APIStatusEnum::CREATED => "New entity launched into the cosmos.",
            APIStatusEnum::BAD_REQUEST => "Your request veered off course and couldn't escape Earth's gravity!",
            APIStatusEnum::UNAUTHORIZED => "Your credentials don't pass the cosmic gatekeeper!",
            APIStatusEnum::FORBIDDEN => "Your request can't travel beyond the space-time boundary!",
            APIStatusEnum::NOT_FOUND => "The data you're seeking is beyond the bounds of space!",
            APIStatusEnum::UNPROCESSABLE_ENTITY => "Data anomaly detected. Unable to process your request in this dimension!",
            APIStatusEnum::INTERNAL_SERVER_ERROR => "Galactic disruption. An unexpected cosmic event occurred!",
        };
    }
}

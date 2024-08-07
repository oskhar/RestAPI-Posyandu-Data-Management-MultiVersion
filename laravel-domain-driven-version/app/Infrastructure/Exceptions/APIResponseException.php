<?php

namespace App\Infrastructure\Exceptions;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\API\Enums\APIStatusEnum;
use App\Infrastructure\Services\APIResponseService;
use Illuminate\Http\Exceptions\HttpResponseException;

class APIResponseException extends HttpResponseException
{

    public function __construct(array $errors, \Exception $exception, APIResponseService $response, APIStatusEnum $status = APIStatusEnum::BAD_REQUEST)
    {
        if (!empty($exception->getMessage())) {
            $errors[] = $exception->getMessage();
            $status = APIStatusEnum::INTERNAL_SERVER_ERROR;
        }
        return parent::__construct(
            $response(
                APIResponseData::from([
                    "status" => false,
                    "errors" => $errors
                ]),
                $status
            )
        );
    }
}

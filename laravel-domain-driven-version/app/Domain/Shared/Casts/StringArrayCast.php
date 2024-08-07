<?php

namespace Domain\Shared\Casts;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\API\Enums\APIStatusEnum;
use App\Infrastructure\Exceptions\APIResponseException;
use App\Infrastructure\Services\APIResponseService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;

class StringArrayCast implements Cast
{
    protected $errors = [];
    protected APIResponseService $response;

    /**
     * Create a new service instance.
     * @param \App\Infrastructure\Services\APIResponseService $response
     */
    public function __construct(APIResponseService $response)
    {
        $this->response = $response;
    }

    /**
     * Summary of cast
     * @param \Spatie\LaravelData\Support\DataProperty $property
     * @param mixed $value
     * @param array $properties
     * @param \Spatie\LaravelData\Support\Creation\CreationContext $context
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return mixed
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        try {

            if (is_null($value)) {
                return null;
            }

            if (!is_array($value)) {
                $this->errors[] = "The {$property->name} must be an array.";
            }

            foreach ($value as $item) {
                if (!is_string($item)) {
                    $this->errors[] = "The {$property->name} array can only contain strings.";
                }
            }

            if (!empty($errors)) {
                throw new \Exception();
            }

            return $value;
        } catch (\Exception $exception) {

            throw new APIResponseException(
                $this->errors,
                $exception,
                $this->response
            );
        }
    }
}

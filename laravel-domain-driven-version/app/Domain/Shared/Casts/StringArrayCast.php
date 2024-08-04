<?php

namespace Domain\Shared\Casts;

use Domain\Shared\Data\APIResponseData;
use Domain\Shared\Enums\APIResponseEnum;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;

class StringArrayCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        $errors = [];

        if (is_null($value)) {
            return null;
        }

        if (!is_array($value)) {
            $errors[] = "The {$property->name} must be an array.";
        }

        foreach ($value as $item) {
            if (!is_string($item)) {
                $errors[] = "The {$property->name} array can only contain strings.";
            }
        }

        if (!empty($errors)) {
            throw APIResponseEnum::BAD_REQUEST->generate(
                APIResponseData::from(
                    status: false,
                    errors: $errors
                )
            );
        }

        return $value;
    }
}

<?php

namespace Domain\Shared\Casts;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Uppercase;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;

class CaseCast implements Cast, Transformer
{
    /**
     * Cast your data
     *
     * @param \Spatie\LaravelData\Support\DataProperty $property
     * @param mixed $value
     * @param array $properties
     * @param \Spatie\LaravelData\Support\Creation\CreationContext $context
     * @return string
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): string
    {
        return strtolower($value);
    }

    /**
     * Transform output data
     *
     * @param \Spatie\LaravelData\Support\DataProperty $property
     * @param mixed $value
     * @param \Spatie\LaravelData\Support\Transformation\TransformationContext $context
     * @return string
     */
    public function transform(DataProperty $property, mixed $value, TransformationContext $context): string
    {
        return strtoupper($value);
    }
}

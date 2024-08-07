<?php

namespace Domain\Shared\Casts;

use Carbon\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;

class DatetimeResponseCast implements Cast, Transformer
{
    protected $defaultFormat = 'd-m-Y H:i:s';
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): string
    {
        return Carbon::createFromFormat($this->defaultFormat, $value);
    }
    public function transform(DataProperty $property, mixed $value, TransformationContext $context): string
    {
        return $value instanceof Carbon ? $value->format($this->defaultFormat) : $value;
    }
}

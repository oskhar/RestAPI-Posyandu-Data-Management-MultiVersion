<?php

namespace Domain\Shared\Casts;

use Carbon\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;

class DateResponseCast implements Cast, Transformer
{
    /**
     * Default forma schema
     * @var string
     */
    protected $defaultFormat = 'd m Y';

    /**
     * List month in bahasa
     * @var array
     */
    protected $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

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
        return $this->formatDate(
            Carbon::parse($value)
        );
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
        if ($value instanceof Carbon) {
            return $this->formatDate($value);
        }

        return $value;
    }

    protected function formatDate(Carbon $date): string
    {
        return $date->format('d') . ' ' .
            $this->bulan[$date->month] . ' ' .
            $date->format('Y');
    }
}

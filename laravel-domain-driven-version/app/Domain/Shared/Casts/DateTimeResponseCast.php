<?php

namespace Domain\Shared\Casts;

use Carbon\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;

class DateTimeResponseCast implements Cast, Transformer
{
    protected $defaultFormat = 'd m Y H:i:s';
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

    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): string
    {
        return $this->formatDateTime(
            Carbon::createFromFormat($this->defaultFormat, $value)
        );
    }

    public function transform(DataProperty $property, mixed $value, TransformationContext $context): string
    {
        if ($value instanceof Carbon) {
            return $this->formatDateTime($value);
        }

        return $value;
    }

    protected function formatDateTime(Carbon $dateTime): string
    {
        return $dateTime->format('d') . ' ' .
            $this->bulan[$dateTime->month] . ' ' .
            $dateTime->format('Y H:i:s');
    }
}

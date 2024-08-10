<?php

namespace Domain\Shared\Data;

use Domain\Shared\Enums\SortTypeEnum;
use Spatie\LaravelData\Data;

class FilterData extends Data
{
    public function __construct(
        readonly int $length,
        readonly int $page,
        readonly ?string $search,
        readonly ?SortTypeEnum $sort,
    ) {
    }
}

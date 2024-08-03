<?php

namespace Domain\Shared\Data;

use Spatie\LaravelData\Data;

class PaginationData extends Data
{
    public function __construct(
        readonly int $current_page,
        readonly int $total_data,
        readonly int $total_pages,
        readonly int $from,
        readonly int $to
    ) {
    }
}

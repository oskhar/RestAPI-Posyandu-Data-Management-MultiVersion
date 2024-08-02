<?php

namespace Domain\Shared\Data;

use Spatie\LaravelData\Data;

class APIResponseData extends Data
{
    public function __construct(
        readonly bool $status,
        readonly string $message,
        readonly mixed $data = null,
        readonly ?PaginationData $paggination,
    ) {
    }
}

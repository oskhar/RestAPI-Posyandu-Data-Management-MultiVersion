<?php

namespace Domain\Shared\Data;

use Spatie\LaravelData\Data;

class APIResponseData extends Data
{
    public function __construct(
        readonly bool $status,
        readonly ?string $message,
        readonly ?array $data,
        readonly ?array $errors,
        readonly ?PaginationData $pagination,
        readonly ?ResponseMetaData $meta,
    ) {
    }
}

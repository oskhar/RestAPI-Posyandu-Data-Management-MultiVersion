<?php

namespace Domain\Shared\Data;

use Spatie\LaravelData\Data;

class APIResponseData extends Data
{
    public function __construct(
        readonly ?string $message,
        readonly bool $status = true,
        readonly ?array $data,
        readonly ?array $errors,
        readonly ?PaginationData $pagination,
        readonly ?ResponseMetaData $meta,
    ) {
    }
}

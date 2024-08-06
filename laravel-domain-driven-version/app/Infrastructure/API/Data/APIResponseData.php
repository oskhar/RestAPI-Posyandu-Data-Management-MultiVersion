<?php

namespace App\Infrastructure\API\Data;

use Domain\Shared\Casts\StringArrayCast;
use Domain\Shared\Data\PaginationData;
use Domain\Shared\Data\ResponseMetaData;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class APIResponseData extends Data
{
    public function __construct(
        readonly ?string $message,
        readonly bool $status = true,
        readonly ?array $data,
        #[WithCast(StringArrayCast::class)]
        readonly ?array $errors,
        readonly ?PaginationData $pagination,
        readonly ?ResponseMetaData $meta,
    ) {
    }
}

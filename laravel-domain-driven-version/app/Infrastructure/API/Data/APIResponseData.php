<?php

namespace App\Infrastructure\API\Data;

use Domain\Shared\Casts\StringArrayCast;
use Domain\Shared\Data\PaginationData;
use Domain\Shared\Data\ResponseMetaData;
use Domain\User\Data\AccessTokenData;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class APIResponseData extends Data
{
    public function __construct(
        readonly mixed $data = null,
        readonly ?string $message,
        readonly ?array $errors,
        readonly ?PaginationData $pagination,
        readonly ?array $meta,
        readonly ?bool $status = true,
    ) {
    }
}

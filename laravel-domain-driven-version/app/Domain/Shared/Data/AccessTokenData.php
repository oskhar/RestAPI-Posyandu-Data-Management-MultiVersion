<?php

namespace Domain\Shared\Data;

use Spatie\LaravelData\Data;

class AccessTokenData extends Data
{
    public function __construct(
        readonly string $access_token,
        readonly string $token_type,
        readonly int $expires_in,
    ) {
    }
}

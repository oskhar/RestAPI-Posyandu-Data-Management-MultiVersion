<?php

namespace Domain\User\Data;

use Domain\Shared\Casts\DatetimeResponseCast;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCastAndTransformer;
use Spatie\LaravelData\Data;

class AccessTokenData extends Data
{
    public function __construct(
        readonly ?string $access_token,
        #[WithCastAndTransformer(DatetimeResponseCast::class)]
        readonly ?Carbon $expires_at,
    ) {
    }
}

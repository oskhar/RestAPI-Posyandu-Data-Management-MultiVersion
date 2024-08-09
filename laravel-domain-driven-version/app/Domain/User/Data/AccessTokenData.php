<?php

namespace Domain\User\Data;

use Carbon\Carbon;
use Domain\User\Models\User;
use Spatie\LaravelData\Data;

class AccessTokenData extends Data
{
    public function __construct(
        readonly ?string $access_token,
        readonly ?Carbon $expires_at,
    ) {
    }

    public static function fromUserModel(User $user, bool $remember_me = false): self
    {
        return self::from([
            "access_token" => $user->createToken(
                'personal_access_tokens',
                ['*'],
                $expiresAt = Carbon::now()->addMinutes(
                    config("sanctum." . ($remember_me ? "rm_expiration" : "ac_expiration"))
                )
            )->plainTextToken,
            "expires_at" => $expiresAt,
        ]);
    }
}

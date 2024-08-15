<?php

namespace Domain\User\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserData extends Data
{
    public function __construct(
        readonly string $full_name,
        readonly string $gender,
        readonly string $language,
        readonly string|Optional $password,
        readonly string|Optional $role,
        readonly ?string $profile_picture,
        readonly ?string $phone_number,
        readonly ?string $birth_date,
    ) {
    }
}

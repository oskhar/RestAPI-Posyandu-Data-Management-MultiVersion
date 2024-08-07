<?php

namespace Domain\User\Data;

use Spatie\LaravelData\Data;

class LoginData extends Data
{
    public function __construct(
        readonly string $email,
        readonly string $password,
    ) {
    }
}

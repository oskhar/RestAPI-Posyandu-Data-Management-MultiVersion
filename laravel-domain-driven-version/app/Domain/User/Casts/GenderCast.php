<?php

namespace Domain\User\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GenderCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return match (Auth::user()->language ?? config("app.locale")) {
            "id" => match ($value) {
                    "male" => "L",
                    "female" => "P",
                },
            "en" => $value,
        };
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return match ($value) {
            "L" => "male",
            "P" => "female",
            "male" => "male",
            "female" => "female",
        };
    }
}

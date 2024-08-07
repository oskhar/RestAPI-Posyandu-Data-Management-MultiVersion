<?php

namespace Domain\User\Data;

use Domain\User\Enums\AdminRolesEnum;
use Domain\User\Enums\UserRolesEnum;
use Domain\User\Models\Admin;
use Domain\User\Models\JobTitle;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelData\Data;

class AdminData extends Data
{
    public function __construct(
        readonly int $id,
        readonly string $full_name,
        readonly string $email,
        readonly string $gender,
        readonly UserRolesEnum $role,
        readonly string $job_title,
        readonly ?string $password,
        readonly ?string $profile_picture,
        readonly ?string $phone_number,
        readonly ?string $birth_date,
        readonly ?string $created_at,
    ) {
    }

    public function fromAuth(): self
    {
        return self::from([
            "id" => Auth::user()->id,
            "full_name" => Auth::user()->full_name,
            "email" => Auth::user()->email,
            "gender" => Auth::user()->gender,
            "role" => UserRolesEnum::from(Auth::user()->role),
            "job_title" => JobTitle::findOrFail(
                Admin::where('user_id', Auth::user()->id)
                    ->pluck('job_title_id')
                    ->first()
            )->name,
            "password" => Auth::user()->password,
            "profile_picture" => Auth::user()->profile_picture,
            "phone_number" => Auth::user()->phone_number,
            "birth_date" => Auth::user()->birth_date,
            "created_at" => Auth::user()->created_at,
        ]);
    }
}

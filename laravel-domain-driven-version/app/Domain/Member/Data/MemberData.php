<?php

namespace Domain\Member\Data;

use Carbon\Carbon;
use Domain\Shared\Casts\CaseCast;
use Domain\Shared\Casts\DateResponseCast;
use Domain\Shared\Casts\DateTimeResponseCast;
use Domain\User\Models\Admin;
use Domain\User\Models\JobTitle;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelData\Attributes\WithCastAndTransformer;
use Spatie\LaravelData\Data;

class MemberData extends Data
{
    public function __construct(
        readonly int $id,
        readonly string $full_name,
        readonly string $email,
        #[WithCastAndTransformer(CaseCast::class)]
        readonly string $gender,
        readonly ?string $profile_picture,
        readonly ?string $phone_number,
        readonly string $poin,
        #[WithCastAndTransformer(DateResponseCast::class)]
        readonly ?Carbon $birth_date,
        #[WithCastAndTransformer(DateTimeResponseCast::class)]
        readonly ?Carbon $created_at,
    ) {
    }

    public static function fromAuth(): self
    {
        return self::from([
            "id" => Auth::user()->id,
            "full_name" => Auth::user()->full_name,
            "email" => Auth::user()->email,
            "gender" => Auth::user()->gender,
            "job_title" => JobTitle::findOrFail(
                Admin::where('user_id', Auth::user()->id)
                    ->pluck('job_title_id')
                    ->first()
            )->name,
            "password" => Auth::user()->password,
            "profile_picture" => Auth::user()->profile_picture,
            "phone_number" => Auth::user()->phone_number,
            "birth_date" => Carbon::parse(Auth::user()->birth_date),
            "created_at" => Auth::user()->created_at,
        ]);
    }
}

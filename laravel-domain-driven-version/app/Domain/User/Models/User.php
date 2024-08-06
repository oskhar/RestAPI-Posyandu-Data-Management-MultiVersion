<?php

namespace Domain\User\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends BaseModel
{
    use SoftDeletes, HasApiTokens, Notifiable;

    /**
     * Atribut atau kolom yang boleh diubah.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role',
        'gender',
        'profile_picture',
        'phone_number',
        'birth_date',
    ];
}

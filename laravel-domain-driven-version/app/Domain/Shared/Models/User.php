<?php

namespace Domain\Shared\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;


class User extends BaseModel
{
    use SoftDeletes, HasApiTokens;

    protected $casts = [];
}

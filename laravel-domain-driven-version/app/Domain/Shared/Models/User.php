<?php

namespace Domain\Shared\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel
{
    use SoftDeletes;

    protected $casts = [];
}

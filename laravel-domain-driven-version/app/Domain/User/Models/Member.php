<?php

namespace Domain\User\Models;

use Domain\Shared\Models\BaseModel;

class Member extends BaseModel
{
    /**
     * Atribut atau kolom yang boleh diubah.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "poin"
    ];
}

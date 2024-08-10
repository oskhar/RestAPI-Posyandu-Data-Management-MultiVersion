<?php

namespace Domain\Admin\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends BaseModel
{
    use SoftDeletes;

    /**
     * Atribut atau kolom yang boleh diubah.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_title_id',
        'address',
    ];

    public static function getDetailedData()
    {
        return self::select('users.*')
            ->addSelect(
                'job_titles.name as job_title',
                'admins.id',
                'admins.address'
            )
            ->join('users', 'users.id', '=', 'admins.user_id')
            ->join('job_titles', 'job_titles.id', '=', 'admins.job_title_id');
    }
}

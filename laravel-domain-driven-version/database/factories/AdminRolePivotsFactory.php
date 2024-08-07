<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\job_title_pivots;

class AdminRolePivotsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminRolePivots::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'admin_id' => Admin::factory(),
            'job_title_id' => AdminRole::factory(),
        ];
    }
}

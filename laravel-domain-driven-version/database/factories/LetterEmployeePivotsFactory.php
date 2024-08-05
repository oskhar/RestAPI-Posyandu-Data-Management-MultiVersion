<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Letter;
use App\Models\letter_employee_pivots;

class LetterEmployeePivotsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LetterEmployeePivots::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'letter_id' => Letter::factory(),
            'employee_id' => Employee::factory(),
        ];
    }
}

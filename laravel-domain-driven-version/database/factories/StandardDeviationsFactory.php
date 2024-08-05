<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\standard_deviations;

class StandardDeviationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StandardDeviations::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'gender' => $this->faker->randomElement(["L","P"]),
            'age_in_months' => $this->faker->numberBetween(-10000, 10000),
            'severely_underweight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'underweight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'normal_underweight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'healthy' => $this->faker->randomFloat(0, 0, 9999999999.),
            'normal_overweight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'overweight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'severely_overweight' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}

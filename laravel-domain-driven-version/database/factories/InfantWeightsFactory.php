<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Infant;
use App\Models\StandardDeviation;
use App\Models\infant_weights;

class InfantWeightsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InfantWeights::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'infant_id' => Infant::factory(),
            'standard_deviation_id' => StandardDeviation::factory(),
            'weighing_year' => $this->faker->randomNumber(),
            'weighing_month' => $this->faker->randomNumber(),
            'weight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'height' => $this->faker->randomFloat(0, 0, 9999999999.),
            'mid_upper_arm_circumference' => $this->faker->randomFloat(0, 0, 9999999999.),
            'head_circumference' => $this->faker->randomFloat(0, 0, 9999999999.),
            'measurement_method' => $this->faker->word(),
            'ntob' => $this->faker->word(),
            'exclusive_breastfeeding' => $this->faker->boolean(),
            'vitamins_a' => $this->faker->boolean(),
            'tetanus_neonatorum' => $this->faker->boolean(),
        ];
    }
}

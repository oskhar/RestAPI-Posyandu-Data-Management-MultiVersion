<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Resident;
use App\Models\infants;

class InfantsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Infants::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'resident_id' => Resident::factory(),
            'child_order' => $this->faker->randomNumber(),
            'birth_weight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'birth_height' => $this->faker->randomFloat(0, 0, 9999999999.),
            'is_imd' => $this->faker->boolean(),
            'is_exclusive_breastfeeding' => $this->faker->boolean(),
            'services_received' => $this->faker->text(),
            'immunization_based_on_weight' => $this->faker->word(),
            'has_kms' => $this->faker->boolean(),
            'has_kia' => $this->faker->boolean(),
            'notes' => $this->faker->text(),
        ];
    }
}

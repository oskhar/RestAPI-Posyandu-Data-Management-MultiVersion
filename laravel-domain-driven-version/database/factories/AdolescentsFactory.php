<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Resident;
use App\Models\adolescents;

class AdolescentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adolescents::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'resident_id' => Resident::factory(),
            'weight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'height' => $this->faker->randomFloat(0, 0, 9999999999.),
            'waist_circumference' => $this->faker->randomFloat(0, 0, 9999999999.),
            'arm_circumference' => $this->faker->randomFloat(0, 0, 9999999999.),
            'hemoglobin' => $this->faker->randomFloat(0, 0, 9999999999.),
            'blood_pressure' => $this->faker->word(),
            'notes' => $this->faker->text(),
        ];
    }
}

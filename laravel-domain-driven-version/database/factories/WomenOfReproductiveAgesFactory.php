<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Resident;
use App\Models\women_of_reproductive_ages;

class WomenOfReproductiveAgesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WomenOfReproductiveAges::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'resident_id' => Resident::factory(),
            'ks_stage' => $this->faker->word(),
            'dasawisma_group' => $this->faker->word(),
            'arm_circumference' => $this->faker->randomFloat(0, 0, 9999999999.),
            'number_of_living_children' => $this->faker->randomNumber(),
            'number_of_deceased_children' => $this->faker->randomNumber(),
            'immunization' => $this->faker->text(),
            'contraception_type' => $this->faker->word(),
            'contraception_replacement_date' => $this->faker->date(),
            'notes' => $this->faker->text(),
        ];
    }
}

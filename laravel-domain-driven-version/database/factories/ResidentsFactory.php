<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Family;
use App\Models\residents;

class ResidentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Residents::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'admin_id' => Admin::factory(),
            'familie_id' => Family::factory(),
            'name' => $this->faker->name(),
            'nik' => $this->faker->word(),
            'gender' => $this->faker->randomElement(["L","P"]),
            'position' => $this->faker->word(),
            'birth_place' => $this->faker->text(),
            'birth_date' => $this->faker->date(),
            'date_of_death' => $this->faker->date(),
            'education' => $this->faker->word(),
            'occupation' => $this->faker->word(),
            'notes' => $this->faker->text(),
        ];
    }
}

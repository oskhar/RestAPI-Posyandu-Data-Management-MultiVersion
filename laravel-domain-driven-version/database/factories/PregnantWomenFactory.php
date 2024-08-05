<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Resident;
use App\Models\pregnant_women;

class PregnantWomenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PregnantWomen::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'resident_id' => Resident::factory(),
            'dasawisma_group' => $this->faker->word(),
            'registration_date' => $this->faker->date(),
            'pregnancy_age' => $this->faker->numberBetween(-10000, 10000),
            'pregnancy_order' => $this->faker->numberBetween(-10000, 10000),
            'lila' => $this->faker->randomFloat(0, 0, 9999999999.),
            'supplementary_feeding' => $this->faker->word(),
            'iron_pills' => $this->faker->text(),
            'immunizations' => $this->faker->text(),
            'vitamins_a' => $this->faker->boolean(),
            'notes' => $this->faker->text(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\community_centers;

class CommunityCentersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommunityCenters::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'city' => $this->faker->city(),
            'district' => $this->faker->word(),
            'sub_district' => $this->faker->word(),
            'leader_statement' => $this->faker->text(),
            'organizational_structure_image' => $this->faker->word(),
            'tasks_and_effects' => $this->faker->text(),
            'vision' => $this->faker->text(),
            'mission' => $this->faker->text(),
            'last_updated_by' => User::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Challenge;
use App\Models\Member;
use App\Models\submissions;

class SubmissionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Submissions::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'challenge_id' => Challenge::factory(),
            'member_id' => Member::factory(),
            'file' => $this->faker->word(),
            'link' => $this->faker->word(),
            'feedback' => $this->faker->text(),
            'ranking' => $this->faker->numberBetween(-10000, 10000),
            'poin' => $this->faker->randomNumber(),
            'status' => $this->faker->randomElement(["Tersubmit","Sedang"]),
        ];
    }
}

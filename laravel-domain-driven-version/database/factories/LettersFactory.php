<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\letters;

class LettersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Letters::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'admin_id' => Admin::factory(),
            'signatory_name' => $this->faker->word(),
            'signatory_position' => $this->faker->word(),
            'letter_date' => $this->faker->date(),
            'letter_number' => $this->faker->word(),
            'opening_sentence' => $this->faker->text(),
            'body_sentence' => $this->faker->text(),
            'closing_sentence' => $this->faker->text(),
            'is_draft' => $this->faker->boolean(),
        ];
    }
}

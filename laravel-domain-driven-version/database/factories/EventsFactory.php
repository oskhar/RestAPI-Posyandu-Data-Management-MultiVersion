<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\events;

class EventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Events::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'admin_id' => Admin::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'image' => $this->faker->word(),
            'start_datetime' => $this->faker->dateTime(),
            'end_datetime' => $this->faker->dateTime(),
            'location' => $this->faker->text(),
            'overview' => $this->faker->text(),
        ];
    }
}

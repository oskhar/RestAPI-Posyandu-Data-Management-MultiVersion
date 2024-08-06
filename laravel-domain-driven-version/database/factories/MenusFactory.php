<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\menus;

class MenusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menus::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->word(),
            'route' => $this->faker->word(),
            'icon' => $this->faker->word(),
            'parent_id' => Menu::factory(),
            'has_child' => $this->faker->boolean(),
        ];
    }
}

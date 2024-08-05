<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\products;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'admin_id' => Admin::factory(),
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'description' => $this->faker->text(),
            'overview' => $this->faker->text(),
            'price' => $this->faker->randomNumber(),
            'image' => $this->faker->word(),
            'active' => $this->faker->boolean(),
            'pin' => $this->faker->boolean(),
        ];
    }
}

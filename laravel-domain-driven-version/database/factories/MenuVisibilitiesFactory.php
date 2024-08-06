<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AdminRole;
use App\Models\Menu;
use App\Models\menu_visibilities;

class MenuVisibilitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuVisibilities::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'admin_role_id' => AdminRole::factory(),
            'menu_id' => Menu::factory(),
        ];
    }
}

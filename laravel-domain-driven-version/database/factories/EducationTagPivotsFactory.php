<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Education;
use App\Models\EducationTag;
use App\Models\education_tag_pivots;

class EducationTagPivotsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EducationTagPivots::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'education_id' => Education::factory(),
            'education_tag_id' => EducationTag::factory(),
        ];
    }
}

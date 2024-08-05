<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BannerSlider;
use App\Models\CommunityCenter;
use App\Models\community_center_banner_sliders;

class CommunityCenterBannerSlidersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommunityCenterBannerSliders::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'community_center_id' => CommunityCenter::factory(),
            'banner_slider_id' => BannerSlider::factory(),
        ];
    }
}

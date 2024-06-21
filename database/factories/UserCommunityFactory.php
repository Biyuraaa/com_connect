<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserCommunity>
 */
class UserCommunityFactory extends Factory
{
    protected $model = \App\Models\UserCommunity::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'community_id' => \App\Models\Community::all()->random()->id,
            'role' => 'member',
            'is_active' => $this->faker->boolean(),
            'created_at' => $this->faker->dateTimeThisYear(),

        ];
    }
}

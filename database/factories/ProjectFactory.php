<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'date' => $this->faker->date(),
            'location' => $this->faker->address,
            'organizer_id' => \App\Models\User::all()->random()->id,
            'status' => $this->faker->randomElement(['completed', 'progress']),
            'category_id' => \App\Models\CategoryProject::all()->random()->id,
            'capacity' => $this->faker->numberBetween(10, 100),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->name,
            'deadline' => $this->faker->name,
            'status' => $this->faker->name,
            'user_id' => $this->faker->name,
            'client_id' => $this->faker->name,
        ];
    }
}

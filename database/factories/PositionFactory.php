<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $departments = Department::all()->pluck('id');
        return [
            'name' => fake()->jobTitle(),
            'code' => fake()->regexify('[A-Za-z0-9]{20}'),
            'description' => fake()->text(),
            'department_id' => $departments->random(),
            'is_active' => fake()->boolean(),
        ];
    }
}

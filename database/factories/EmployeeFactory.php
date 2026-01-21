<?php

namespace Database\Factories;

use App\Models\AccessLevel;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $departments = Department::all()->pluck('id');
        $positions = Position::all()->pluck('id');
        $accessLevels = AccessLevel::all()->pluck('id');
        return [
            'employee_number' => fake()->regexify('[A-Za-z0-9]{20}'),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'department_id' => $departments->random(),
            'position_id' => $positions->random(),
            'manager_id' => null,
            'status' => fake()->randomElement(["active","inactive","on_leave","terminated","suspended"]),
            'hire_date' => fake()->date(),
            'termination_date' => fake()->date(),
            'access_level_id' => $accessLevels->random(),
            'badge_id' => fake()->regexify('[A-Za-z0-9]{50}'),
            'created_by' => fake()->regexify('[A-Za-z0-9]{100}'),
            'updated_by' => fake()->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}

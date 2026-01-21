<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            [
                'name' => "IT",
                'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                'description' => "IT Department",
                'is_active' => true,
            ],
            [
                'name' => "HR",
                'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                'description' => "HR Department",
                'is_active' => true,
            ],
            [
                'name' => "Finance",
                'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                'description' => "Finance Department",
                'is_active' => true,
            ],
            [
                'name' => "Marketing",
                'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                'description' => "Marketing Department",
                'is_active' => true,
            ],
            [
                'name' => "Sales",
                'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                'description' => "Sales Department",
                'is_active' => true,
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\AccessLevel;
use Illuminate\Database\Seeder;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // AccessLevel::factory()->count(5)->create();
        // make guest , low , medium , high , admin
        AccessLevel::insert(
            [
                [
                    'name' => "Guest",
                    'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                    'description' => "Guest Access Level",
                    'priority' => 1,
                ],
                [
                    'name' => "Low",
                    'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                    'description' => "Low Access Level",
                    'priority' => 2,
                ],
                [
                    'name' => "Medium",
                    'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                    'description' => "Medium Access Level",
                    'priority' => 3,
                ],
                [
                    'name' => "High",
                    'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                    'description' => "High Access Level",
                    'priority' => 4,
                ],
                [
                    'name' => "Admin",
                    'code' => fake()->regexify('[A-Za-z0-9]{20}'),
                    'description' => "Admin Access Level",
                    'priority' => 100,
                ],
            ]
            );
    }
}

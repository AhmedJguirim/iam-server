<?php

namespace Database\Seeders;

use App\Models\AccessGroup;
use Illuminate\Database\Seeder;

class AccessGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccessGroup::factory()->count(5)->create();
    }
}

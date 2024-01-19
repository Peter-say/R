<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategoryTableSeeder::class);
        \App\Models\Property::factory(30)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(10)->agent()->create();
    }
}

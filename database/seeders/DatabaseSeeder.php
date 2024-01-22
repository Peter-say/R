<?php

namespace Database\Seeders;
use App\Models\User; 

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
        \App\Models\User::factory(10)->agent()->create();
        $this->call(CategoryTableSeeder::class);
        \App\Models\PropertyAddress::factory(15)->create();
        \App\Models\Property::factory(30)->create();
       
        
    }

}

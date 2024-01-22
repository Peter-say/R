<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Residential',
                'parent_id' => null,
            ],
    
            [
                'name' => 'Commercial',
                'parent_id' => null,
            ],
    
            [
                'name' => 'Apartment',
                'parent_id' => 1, // Parent category: Residential
            ],
    
            [
                'name' => 'Land',
                'parent_id' => 1, // Parent category: Residential
            ],
    
            [
                'name' => 'Building Code',
                'parent_id' => 2, // Parent category: Commercial
            ],
    
            [
                'name' => 'Communal Land',
                'parent_id' => 1, // Parent category: Residential
            ],
    
            [
                'name' => 'Floor Area',
                'parent_id' => 2, // Parent category: Commercial
            ],
    
            [
                'name' => 'Insurability',
                'parent_id' => 2, // Parent category: Commercial
            ],
    
            // Add more subcategories as needed
        ];

        foreach ($datas as $key => $data) {
            Category::create($data);
        }
    }
}

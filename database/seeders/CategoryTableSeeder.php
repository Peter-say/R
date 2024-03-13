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
                'name' => 'Land',
                'parent_id' => null,
            ],

            [
                'name' => 'Rentals',
                'parent_id' => null,
            ],

            [
                'name' => 'Musuem',
                'parent_id' => null,
            ],
    
            [
                'name' => 'Apartment',
                'parent_id' => 1, 
            ],
    
            [
                'name' => 'Land',
                'parent_id' => 1, 
            ],
    
            [
                'name' => 'Building Code',
                'parent_id' => 2, 
            ],
    
            [
                'name' => 'Communal Land',
                'parent_id' => 3, 
            ],
    
            [
                'name' => 'Floor Area',
                'parent_id' => 3, 
            ],
    
            [
                'name' => 'Insurability',
                'parent_id' => 4, 
            ],

            [
                'name' => 'Studio',
                'parent_id' => 3, 
            ],
    
            [
                'name' => 'Market',
                'parent_id' => 5, 
            ],

            [
                'name' => 'Campus',
                'parent_id' => 4, 
            ],
    
            [
                'name' => 'School',
                'parent_id' => 5, 
            ],
    
           
        ];

        foreach ($datas as $key => $data) {
            Category::create($data);
        }
    }
}

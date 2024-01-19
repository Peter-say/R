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
                'name' => 'Resedential',
                'parent_id' => 1,
            ],

            [
                'name' => 'Commercial',
                'parent_id' => 2,
            ],

            [
                'name' => 'Appartment',
                'parent_id' => 1,
            ],

            [
                'name' => 'Land',
                'parent_id' => 2,
            ],

            [
                'name' => 'Laptop',
                'parent_id' => 2,
            ],
        ];

        foreach ($datas as $key => $data) {
            Category::create($data);
        }
    }
}

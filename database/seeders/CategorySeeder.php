<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and equipment.',
        ]);

        Category::create([
            'name' => 'Computer Accessories',
            'description' => 'Computer peripherals and accessories.',
        ]);

        Category::create([
            'name' => 'Office Supplies',
            'description' => 'Stationery and office supplies.',
        ]);

        Category::create([
            'name' => 'Furniture',
            'description' => 'Office and workplace furniture.',
        ]);

        Category::create([
            'name' => 'Networking',
            'description' => 'Networking devices and equipment.',
        ]);
    }
}

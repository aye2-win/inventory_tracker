<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([ 
            'category_id' => 1, 
            'supplier_id' => 1, 
            'name' => 'Laptop', 
            'sku' => 'LAP-001', 
            'description' => 'Business laptop for office use.', 
            'purchase_price' => 700, 
            'selling_price' => 850, 
            'quantity' => 20, 
            'reorder_level' => 5, 
        ]); 
            
        Product::create([ 
            'category_id' => 1, 
            'supplier_id' => 1, 
            'name' => 'Smartphone', 
            'sku' => 'PHN-001', 
            'description' => 'Android smartphone.', 
            'purchase_price' => 250, 
            'selling_price' => 320, 
            'quantity' => 15, 
            'reorder_level' => 5, 
        ]); 
                
        Product::create([ 
            'category_id' => 2, 
            'supplier_id' => 2, 
            'name' => 'Wireless Mouse', 
            'sku' => 'MOU-001', 
            'description' => 'Wireless computer mouse.', 
            'purchase_price' => 15, 
            'selling_price' => 25, 
            'quantity' => 50, 
            'reorder_level' => 10, 
        ]); 
                
        Product::create([ 
            'category_id' => 3, 
            'supplier_id' => 3, 
            'name' => 'Notebook', 
            'sku' => 'NOT-001', 
            'description' => 'A4 office notebook.', 
            'purchase_price' => 2, 
            'selling_price' => 4, 
            'quantity' => 20, 
            'reorder_level' => 20, 
        ]); 
                    
        Product::create([ 
            'category_id' => 4, 
            'supplier_id' => 4, 
            'name' => 'Office Chair', 
            'sku' => 'CHR-001', 
            'description' => 'Adjustable office chair.', 
            'purchase_price' => 80, 
            'selling_price' => 120, 
            'quantity' => 8, 
            'reorder_level' => 5, 
        ]);
    }
}

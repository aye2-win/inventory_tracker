<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StockMovement;

class StockMovementSeeder extends Seeder
{
    public function run(): void
    {
        StockMovement::create([
            'product_id' => 1,
            'type' => 'in',
            'quantity' => 25,
            'note' => 'Initial stock',
        ]);

        StockMovement::create([
            'product_id' => 1,
            'type' => 'out',
            'quantity' => 5,
            'note' => 'Customer order',
        ]);

        StockMovement::create([
            'product_id' => 2,
            'type' => 'in',
            'quantity' => 20,
            'note' => 'New shipment',
        ]);

        StockMovement::create([
            'product_id' => 2,
            'type' => 'out',
            'quantity' => 5,
            'note' => 'Customer order',
        ]);

        StockMovement::create([
            'product_id' => 3,
            'type' => 'in',
            'quantity' => 60,
            'note' => 'Supplier delivery',
        ]);

        StockMovement::create([
            'product_id' => 3,
            'type' => 'out',
            'quantity' => 10,
            'note' => 'Office use',
        ]);

        StockMovement::create([
            'product_id' => 4,
            'type' => 'in',
            'quantity' => 20,
            'note' => 'Initial stock',
        ]);

        StockMovement::create([
            'product_id' => 4,
            'type' => 'out',
            'quantity' => 5,
            'note' => 'Office supply order',
        ]);

        StockMovement::create([
            'product_id' => 5,
            'type' => 'in',
            'quantity' => 10,
            'note' => 'New shipment',
        ]);

        StockMovement::create([
            'product_id' => 5,
            'type' => 'out',
            'quantity' => 2,
            'note' => 'Customer order',
        ]);
    }
}
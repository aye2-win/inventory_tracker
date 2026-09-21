<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'ABC Electronics',
            'email' => 'abc@example.com',
            'phone' => '09123456789',
            'address' => 'Yangon, Myanmar',
        ]);

        Supplier::create([
            'name' => 'Tech World Myanmar',
            'email' => 'techworld@example.com',
            'phone' => '09234567890',
            'address' => 'Yangon, Myanmar',
        ]);

        Supplier::create([
            'name' => 'Office Supply Co.',
            'email' => 'office@example.com',
            'phone' => '09345678901',
            'address' => 'Mandalay, Myanmar',
        ]);

        Supplier::create([
            'name' => 'Myanmar Furniture Co.',
            'email' => 'furniture@example.com',
            'phone' => '09456789012',
            'address' => 'Yangon, Myanmar',
        ]);

        Supplier::create([
            'name' => 'Network Solutions',
            'email' => 'network@example.com',
            'phone' => '09567890123',
            'address' => 'Naypyidaw, Myanmar',
        ]);
    }
}

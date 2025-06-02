<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $specialItems = [
            [
                'name' => 'Printer Epson L380',
                'description' => 'Printer all-in-one dengan isi ulang tinta botolan',
                'quantity' => 15,
                'category_id' => 6,
                'supplier_id' => 1
            ],
            [
                'name' => 'Kursi Direktur Leather',
                'description' => 'Kursi eksekutif berbahan kulit asli',
                'quantity' => 5,
                'category_id' => 2,
                'supplier_id' => 2
            ],
            [
                'name' => 'Proyektor Epson EB-X41',
                'description' => 'Proyektor HD 3LCD 3600 lumen',
                'quantity' => 8,
                'category_id' => 8,
                'supplier_id' => 3
            ]
        ];

        foreach ($specialItems as $item) {
            Item::create($item);
        }

        Item::factory()->count(10)->create();
    }
}
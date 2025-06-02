<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $suppliers = [
            [
                'name' => 'CV Sumber Makmur Jaya',
                'email' => 'info@sumbermakmurjaya.co.id',
                'phone' => '(021) 55678901',
                'address' => 'Jl. Sudirman No. 45, Jakarta Pusat'
            ],
            [
                'name' => 'PT Barokah Perkasa',
                'email' => 'barokah.perkasa@gmail.com',
                'phone' => '081234567890',
                'address' => 'Komplek Ruko Permata Hijau Blok B2, Surabaya'
            ],
            [
                'name' => 'UD Mandiri Sejahtera',
                'email' => 'mandiri.sejahtera@yahoo.com',
                'phone' => '(031) 4567890',
                'address' => 'Jl. Raya Darmo No. 12, Surabaya'
            ]
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

        Supplier::factory()->count(7)->state([
            'name' => function () {
                $types = ['CV', 'PT', 'UD', 'Fa'];
                $words = ['Abadi', 'Sejahtera', 'Makmur', 'Jaya', 'Sukses', 'Bersama', 'Utama'];
                return $types[array_rand($types)] . ' ' . fake('id_ID')->company() . ' ' . $words[array_rand($words)];
            },
            'address' => fake('id_ID')->address()
        ])->create();
    }
}
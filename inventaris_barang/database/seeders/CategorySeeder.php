<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Elektronik Kantor', 'description' => 'Perangkat elektronik untuk kebutuhan perkantoran'],
            ['name' => 'Furniture', 'description' => 'Perabotan dan perlengkapan kantor'],
            ['name' => 'Alat Tulis', 'description' => 'Peralatan tulis menulis dan sekolah'],
            ['name' => 'Peralatan Dapur', 'description' => 'Peralatan untuk dapur dan pantry kantor'],
            ['name' => 'ATK', 'description' => 'Alat Tulis Kantor dan perlengkapan administrasi'],
            ['name' => 'Perangkat IT', 'description' => 'Komputer dan perlengkapan teknologi informasi'],
            ['name' => 'Alat Kebersihan', 'description' => 'Peralatan kebersihan dan pemeliharaan'],
            ['name' => 'Peralatan Presentasi', 'description' => 'Alat pendukung presentasi dan rapat'],
            ['name' => 'Konsumsi', 'description' => 'Bahan makanan dan minuman kantor'],
            ['name' => 'Lainnya', 'description' => 'Barang-barang lain yang tidak termasuk kategori']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
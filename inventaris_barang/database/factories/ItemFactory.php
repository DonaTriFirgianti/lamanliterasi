<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $Items = [
        'Meja Kantor Kayu Jati',
        'Kursi Ergonomis Mesh',
        'Laptop ASUS ROG Zephyrus',
        'Printer Epson L3210',
        'Proyektor Epson EB-X05',
        'Lemari Arsip Besi 4 Susun',
        'AC Split Panasonic 1 PK',
        'Mesin Fotocopy Canon IR 2525',
        'Telepon Kantor Polycom',
        'Whiteboard Magnat 120x240cm',
        'Stapler HD-10D',
        'Penghapus Whiteboard Joyko',
        'Kertas HVS A4 70gr',
        'Binder Clip No. 107',
        'Amplop Coklat Ukuran F4',
        'Timbangan Digital 30kg',
        'Lemari Es 2 Pintu Sharp',
        'Microwave Panasonic 20L',
        'Dispenser Galon Atmos',
        'Kipas Angin Cosmos 16"'
    ];

    protected $Descriptions = [
        'Produk berkualitas tinggi dengan garansi resmi',
        'Dibuat dari bahan terbaik yang ramah lingkungan',
        'Cocok untuk kebutuhan perkantoran modern',
        'Dengan teknologi terkini dan hemat energi',
        'Desain ergonomis untuk kenyamanan maksimal',
        'Tersedia dalam berbagai warna dan ukuran',
        'Mudah dioperasikan dan perawatan sederhana',
        'Kapasitas besar untuk kebutuhan bisnis',
        'Dilengkapi dengan sertifikat keamanan',
        'Harga kompetitif dengan kualitas terjamin'
    ];

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement($this->Items),
            'description' => $this->faker->randomElement($this->Descriptions),
            'quantity' => $this->faker->numberBetween(0, 100),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'supplier_id' => \App\Models\Supplier::inRandomOrder()->first()->id,
        ];
    }
}
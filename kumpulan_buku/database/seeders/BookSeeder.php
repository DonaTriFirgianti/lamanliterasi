<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Buat admin jika belum ada
        $admin = User::firstOrCreate([
            'email' => 'admin@lamanliterasi.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'api_key' => \Illuminate\Support\Str::random(60),
            'email_verified_at' => now()
        ]);

        // Data Kategori
        $categories = [
            ['name' => 'Fiksi'],
            ['name' => 'Sains'],
            ['name' => 'Sejarah'],
            ['name' => 'Teknologi'],
            ['name' => 'Bisnis'],
            ['name' => 'NonFiksi'],
            ['name' => 'Romantis'],
            ['name' => 'Komedi'],
            ['name' => 'Misteri'],
            ['name' => 'Aksi'],
            ['name' => 'Psikolog'],
            ['name' => 'Drama']
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                $category
            );
        }

        // Data Buku
        $books = [
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'description' => 'Novel tentang persahabatan anak-anak di Belitung',
                'category_id' => 1,
                'user_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()
            ],
            [
                'title' => 'Sapiens: Riwayat Singkat Umat Manusia',
                'author' => 'Yuval Noah Harari',
                'description' => 'Sejarah evolusi manusia dari zaman batu hingga modern',
                'category_id' => 3,
                'user_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'description' => 'Membangun kebiasaan baik dan menghilangkan kebiasaan buruk',
                'category_id' => 5,
                'user_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()
            ],
            [
                'title' => 'The Martian',
                'author' => 'Andy Weir',
                'description' => 'Kisah astronot yang terdampar di Mars',
                'category_id' => 2,
                'user_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'Panduan menulis kode pemrograman yang bersih',
                'category_id' => 4,
                'user_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()
            ]
        ];

        foreach ($books as $book) {
            Book::firstOrCreate(
                ['title' => $book['title']], 
                $book
            );
        }
    }
}
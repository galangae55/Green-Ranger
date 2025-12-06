<?php

namespace Database\Seeders;

use App\Models\CategoryBlog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryBlogSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Lingkungan',
                'slug' => Str::slug('Lingkungan'),
                'description' => 'Artikel tentang pelestarian lingkungan dan alam'
            ],
            [
                'name' => 'Keberlanjutan',
                'slug' => Str::slug('Keberlanjutan'),
                'description' => 'Tips dan informasi tentang gaya hidup berkelanjutan'
            ],
            [
                'name' => 'Kebersihan',
                'slug' => Str::slug('Kebersihan'),
                'description' => 'Artikel tentang kebersihan lingkungan dan masyarakat'
            ],
            [
                'name' => 'Konservasi',
                'slug' => Str::slug('Konservasi'),
                'description' => 'Informasi tentang konservasi alam dan satwa'
            ],
            [
                'name' => 'Edukasi',
                'slug' => Str::slug('Edukasi'),
                'description' => 'Materi edukasi tentang lingkungan untuk semua usia'
            ],
            [
                'name' => 'Teknologi Hijau',
                'slug' => Str::slug('Teknologi Hijau'),
                'description' => 'Teknologi ramah lingkungan dan inovasi hijau'
            ],
            [
                'name' => 'Kesehatan Lingkungan',
                'slug' => Str::slug('Kesehatan Lingkungan'),
                'description' => 'Hubungan antara lingkungan dan kesehatan masyarakat'
            ],
            [
                'name' => 'Pertanian Organik',
                'slug' => Str::slug('Pertanian Organik'),
                'description' => 'Praktik pertanian organik dan berkelanjutan'
            ],
        ];

        foreach ($categories as $category) {
            CategoryBlog::create($category);
        }

        $this->command->info('CategoryBlogSeeder berhasil dijalankan!');
    }
}
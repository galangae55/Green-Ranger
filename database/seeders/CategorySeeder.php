<?php

namespace Database\Seeders;

use App\Models\CategoryBlog; // Ganti dari Category ke CategoryBlog
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Lingkungan',
                'description' => 'Artikel tentang pelestarian lingkungan dan alam'
            ],
            [
                'name' => 'Kebersihan',
                'description' => 'Tips dan informasi tentang menjaga kebersihan'
            ],
            [
                'name' => 'Energi',
                'description' => 'Artikel tentang energi terbarukan dan efisiensi energi'
            ],
            [
                'name' => 'Sampah',
                'description' => 'Pengelolaan sampah dan daur ulang'
            ],
            [
                'name' => 'Teknologi Hijau',
                'description' => 'Teknologi ramah lingkungan dan inovasi hijau'
            ],
            [
                'name' => 'Gaya Hidup',
                'description' => 'Gaya hidup berkelanjutan dan eco-friendly'
            ]
        ];

        foreach ($categories as $category) {
            CategoryBlog::create([ // Ganti dari Category ke CategoryBlog
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description']
            ]);
        }
    }
}

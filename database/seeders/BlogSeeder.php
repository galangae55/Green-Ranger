<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\CategoryBlog;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $categories = CategoryBlog::all();
        $tags = Tag::all();

        $blogs = [
            [
                'title' => '10 Cara Mudah Mengurangi Penggunaan Plastik di Rumah',
                'slug' => Str::slug('10 Cara Mudah Mengurangi Penggunaan Plastik di Rumah'),
                'excerpt' => 'Plastik telah menjadi masalah lingkungan yang serius. Berikut adalah 10 cara mudah yang bisa Anda terapkan di rumah untuk mengurangi penggunaan plastik sekali pakai.',
                'content' => $this->generateBlogContent('Plastik', 'Cara Mengurangi Plastik'),
                'author' => 'Green Ranger Team',
                'category_id' => $categories->where('name', 'Lingkungan')->first()->id,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'image' => 'blog1.jpg',
                'tags' => ['Plastik', 'Eco-Friendly', 'Zero Waste', 'Daur Ulang']
            ],
            [
                'title' => 'Manfaat Membuat Kompos dari Sampah Organik',
                'slug' => Str::slug('Manfaat Membuat Kompos dari Sampah Organik'),
                'excerpt' => 'Kompos tidak hanya mengurangi sampah organik, tetapi juga menyuburkan tanah. Pelajari manfaat dan cara membuat kompos dengan mudah.',
                'content' => $this->generateBlogContent('Kompos', 'Manfaat Kompos'),
                'author' => 'Dr. Bambang Setyawan',
                'category_id' => $categories->where('name', 'Keberlanjutan')->first()->id,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'image' => 'blog2.jpg',
                'tags' => ['Kompos', 'Organik', 'Berkelanjutan', 'Sampah']
            ],
            [
                'title' => 'Pentingnya Konservasi Air di Era Perubahan Iklim',
                'slug' => Str::slug('Pentingnya Konservasi Air di Era Perubahan Iklim'),
                'excerpt' => 'Air bersih semakin langka akibat perubahan iklim. Simak pentingnya konservasi air dan tips menghemat air dalam kehidupan sehari-hari.',
                'content' => $this->generateBlogContent('Konservasi Air', 'Pentingnya Air'),
                'author' => 'Prof. Siti Aminah',
                'category_id' => $categories->where('name', 'Konservasi')->first()->id,
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'image' => 'blog3.jpg',
                'tags' => ['Konservasi Air', 'Pemanasan Global', 'Berkelanjutan']
            ],
            [
                'title' => 'Teknologi Panel Surya: Solusi Energi Terbarukan untuk Rumah',
                'slug' => Str::slug('Teknologi Panel Surya: Solusi Energi Terbarukan untuk Rumah'),
                'excerpt' => 'Panel surya menjadi solusi energi terbarukan yang ramah lingkungan. Ketahui keuntungan dan cara memasang panel surya di rumah.',
                'content' => $this->generateBlogContent('Panel Surya', 'Energi Terbarukan'),
                'author' => 'Ir. Agus Santoso',
                'category_id' => $categories->where('name', 'Teknologi Hijau')->first()->id,
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'image' => 'blog4.jpg',
                'tags' => ['Energi Terbarukan', 'Teknologi Hijau', 'Berkelanjutan']
            ],
            [
                'title' => 'Dampak Polusi Udara terhadap Kesehatan Anak',
                'slug' => Str::slug('Dampak Polusi Udara terhadap Kesehatan Anak'),
                'excerpt' => 'Polusi udara tidak hanya merusak lingkungan, tetapi juga berdampak serius pada kesehatan anak. Pelajari cara melindungi keluarga Anda.',
                'content' => $this->generateBlogContent('Polusi Udara', 'Kesehatan Anak'),
                'author' => 'Dr. Maria Wijaya',
                'category_id' => $categories->where('name', 'Kesehatan Lingkungan')->first()->id,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'image' => 'blog5.jpg',
                'tags' => ['Polusi', 'Udara', 'Kesehatan Lingkungan']
            ],
            [
                'title' => 'Pertanian Organik: Masa Depan Pertanian Berkelanjutan',
                'slug' => Str::slug('Pertanian Organik: Masa Depan Pertanian Berkelanjutan'),
                'excerpt' => 'Pertanian organik menawarkan solusi untuk ketahanan pangan yang berkelanjutan. Temukan keuntungan dan prinsip pertanian organik.',
                'content' => $this->generateBlogContent('Pertanian Organik', 'Berkelanjutan'),
                'author' => 'Green Ranger Team',
                'category_id' => $categories->where('name', 'Pertanian Organik')->first()->id,
                'is_published' => true,
                'published_at' => now()->subDays(12),
                'image' => 'blog6.jpg',
                'tags' => ['Pertanian', 'Organik', 'Berkelanjutan']
            ],
            [
                'title' => '5 Langkah Memulai Gaya Hidup Zero Waste',
                'slug' => Str::slug('5 Langkah Memulai Gaya Hidup Zero Waste'),
                'excerpt' => 'Gaya hidup zero waste mungkin terdengar menantang, tetapi sebenarnya bisa dimulai dengan langkah-langkah sederhana. Simak panduannya!',
                'content' => $this->generateBlogContent('Zero Waste', 'Gaya Hidup'),
                'author' => 'Sarah Putri',
                'category_id' => $categories->where('name', 'Keberlanjutan')->first()->id,
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'image' => 'about.jpg',
                'tags' => ['Zero Waste', 'Eco-Friendly', 'Green Lifestyle']
            ],
        ];

        foreach ($blogs as $blogData) {
            // Create blog
            $blog = Blog::create([
                'title' => $blogData['title'],
                'slug' => $blogData['slug'],
                'excerpt' => $blogData['excerpt'],
                'content' => $blogData['content'],
                'author' => $blogData['author'],
                'category_id' => $blogData['category_id'],
                'is_published' => $blogData['is_published'],
                'published_at' => $blogData['published_at'],
                'image' => $blogData['image'],
            ]);

            // Attach tags
            $tagIds = [];
            foreach ($blogData['tags'] as $tagName) {
                $tag = $tags->where('name', $tagName)->first();
                if ($tag) {
                    $tagIds[] = $tag->id;
                }
            }
            
            if (!empty($tagIds)) {
                $blog->tags()->attach($tagIds);
            }
        }

        $this->command->info('BlogSeeder berhasil dijalankan! 10 artikel blog telah dibuat.');
    }

    private function generateBlogContent($topic, $subtopic)
    {
        return "<h2>Pengenalan</h2>
                <p>Dalam era modern ini, isu tentang {$topic} semakin menjadi perhatian global. {$subtopic} menjadi topik yang sangat relevan dengan kondisi lingkungan saat ini.</p>
                
                <h2>Manfaat Utama</h2>
                <p>Ada beberapa manfaat utama yang bisa didapatkan:</p>
                <ul>
                    <li>Mengurangi dampak negatif terhadap lingkungan</li>
                    <li>Meningkatkan kualitas hidup masyarakat</li>
                    <li>Mendukung keberlanjutan ekosistem</li>
                    <li>Menghemat biaya dalam jangka panjang</li>
                </ul>
                
                <h2>Langkah-langkah Implementasi</h2>
                <p>Berikut adalah langkah-langkah yang bisa Anda terapkan:</p>
                <ol>
                    <li>Mulai dari hal-hal kecil di rumah</li>
                    <li>Edukasi diri dan keluarga</li>
                    <li>Implementasi secara bertahap</li>
                    <li>Evaluasi hasil secara berkala</li>
                </ol>
                
                <h2>Tips Praktis</h2>
                <p>Untuk memulai, Anda bisa mencoba tips berikut:</p>
                <p>Pertama, mulailah dengan kesadaran diri tentang pentingnya {$topic}. Kedua, cari informasi yang valid dan terpercaya. Ketiga, terapkan secara konsisten dalam kehidupan sehari-hari.</p>
                
                <h2>Kesimpulan</h2>
                <p>Dengan menerapkan prinsip {$topic}, kita tidak hanya membantu lingkungan tetapi juga menciptakan masa depan yang lebih baik untuk generasi mendatang. Mari bersama-sama menjadi agen perubahan untuk bumi yang lebih hijau!</p>
                
                <blockquote>
                    <p>\"Lingkungan yang sehat adalah hak setiap makhluk hidup. Mari jaga bersama untuk masa depan yang lebih baik.\"</p>
                </blockquote>";
    }
}
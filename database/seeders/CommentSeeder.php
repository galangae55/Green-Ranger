<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $blogs = Blog::all();
        
        $comments = [
            [
                'nama' => 'Ahmad Santoso',
                'email' => 'ahmad.santoso@email.com',
                'komentar' => 'Artikel yang sangat informatif! Saya sudah mencoba mengurangi penggunaan plastik dan hasilnya luar biasa.',
            ],
            [
                'nama' => 'Sari Dewi',
                'email' => 'sari.dewi@email.com',
                'komentar' => 'Terima kasih untuk tips-tipsnya. Sangat membantu untuk saya yang baru mulai belajar tentang gaya hidup berkelanjutan.',
            ],
            [
                'nama' => 'Budi Pratama',
                'email' => 'budi.pratama@email.com',
                'komentar' => 'Saya setuju dengan poin-poin yang disampaikan. Perlu lebih banyak edukasi seperti ini di masyarakat.',
            ],
            [
                'nama' => 'Maya Indah',
                'email' => 'maya.indah@email.com',
                'komentar' => 'Artikelnya sangat lengkap dan mudah dipahami. Apakah ada tips khusus untuk anak-anak?',
            ],
            [
                'nama' => 'Rizky Fadillah',
                'email' => 'rizky.fadillah@email.com',
                'komentar' => 'Informasi yang sangat berguna. Saya akan bagikan artikel ini ke teman-teman saya.',
            ],
            [
                'nama' => 'Dian Permatasari',
                'email' => 'dian.permatasari@email.com',
                'komentar' => 'Saya sudah menerapkan beberapa tips dari artikel ini dan hasilnya sangat memuaskan. Terima kasih!',
            ],
            [
                'nama' => 'Hendra Kurniawan',
                'email' => 'hendra.kurniawan@email.com',
                'komentar' => 'Apakah ada komunitas atau grup yang fokus pada isu lingkungan di daerah Surabaya?',
            ],
            [
                'nama' => 'Lisa Anggraeni',
                'email' => 'lisa.anggraeni@email.com',
                'komentar' => 'Sangat inspiratif! Saya jadi termotivasi untuk lebih peduli dengan lingkungan sekitar.',
            ],
            [
                'nama' => 'Fajar Nugroho',
                'email' => 'fajar.nugroho@email.com',
                'komentar' => 'Informasi yang disampaikan sangat relevan dengan kondisi saat ini. Semoga makin banyak orang yang sadar akan pentingnya lingkungan.',
            ],
            [
                'nama' => 'Nina Sari',
                'email' => 'nina.sari@email.com',
                'komentar' => 'Apakah Green Ranger punya program volunteering? Saya ingin ikut berkontribusi.',
            ],
        ];

        foreach ($blogs as $blog) {
            // Add 2-4 random comments to each blog
            $commentCount = rand(2, 4);
            
            for ($i = 0; $i < $commentCount; $i++) {
                $randomComment = $comments[array_rand($comments)];
                
                Comment::create([
                    'blog_id' => $blog->id,
                    'nama' => $randomComment['nama'],
                    'email' => $randomComment['email'],
                    'komentar' => $randomComment['komentar'],
                    'is_approved' => true,
                    'origin' => 'blog'
                ]);
            }
        }

        $this->command->info('CommentSeeder berhasil dijalankan! Komentar telah ditambahkan ke setiap blog.');
    }
}
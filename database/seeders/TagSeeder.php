<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            ['name' => 'Eco-Friendly', 'slug' => Str::slug('Eco-Friendly')],
            ['name' => 'Plastik', 'slug' => Str::slug('Plastik')],
            ['name' => 'Daur Ulang', 'slug' => Str::slug('Daur Ulang')],
            ['name' => 'Energi Terbarukan', 'slug' => Str::slug('Energi Terbarukan')],
            ['name' => 'Kebersihan', 'slug' => Str::slug('Kebersihan')],
            ['name' => 'Konservasi Air', 'slug' => Str::slug('Konservasi Air')],
            ['name' => 'Pemanasan Global', 'slug' => Str::slug('Pemanasan Global')],
            ['name' => 'Polusi', 'slug' => Str::slug('Polusi')],
            ['name' => 'Hutan', 'slug' => Str::slug('Hutan')],
            ['name' => 'Satwa Liar', 'slug' => Str::slug('Satwa Liar')],
            ['name' => 'Kompos', 'slug' => Str::slug('Kompos')],
            ['name' => 'Zero Waste', 'slug' => Str::slug('Zero Waste')],
            ['name' => 'Pertanian', 'slug' => Str::slug('Pertanian')],
            ['name' => 'Organik', 'slug' => Str::slug('Organik')],
            ['name' => 'Berkelanjutan', 'slug' => Str::slug('Berkelanjutan')],
            ['name' => 'Green Lifestyle', 'slug' => Str::slug('Green Lifestyle')],
            ['name' => 'Sampah', 'slug' => Str::slug('Sampah')],
            ['name' => 'Laut', 'slug' => Str::slug('Laut')],
            ['name' => 'Udara', 'slug' => Str::slug('Udara')],
            ['name' => 'Tanah', 'slug' => Str::slug('Tanah')],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }

        $this->command->info('TagSeeder berhasil dijalankan!');
    }
}
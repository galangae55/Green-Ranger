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
            'Lingkungan', 'Kebersihan', 'Sampah', 'Daur Ulang', 'Energi',
            'Air', 'Udara', 'Tanah', 'Polusi', 'Konservasi', 'Hutan',
            'Laut', 'Sungai', 'Teknologi', 'Energi Terbarukan', 'Eco-Friendly',
            'Ramah Lingkungan', 'Berkelanjutan', 'Zero Waste', 'Organik', 'Hijau'
        ];

        foreach ($tags as $tagName) {
            Tag::create([
                'name' => $tagName,
                'slug' => Str::slug($tagName)
            ]);
        }
    }
}

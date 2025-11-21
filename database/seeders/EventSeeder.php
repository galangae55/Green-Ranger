<?php
// database/seeders/EventSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\DetailAcara;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        // 1. Kenjeran Clean
        $kenjeran = Event::create([
            'title' => 'Kenjeran Clean',
            'slug' => 'kenjeran-clean',
            'description' => 'Ayo bergabung dan jadilah pahlawan kebersihan Pantai Kenjeran',
            'image' => 'event2.jpg',
            'date' => '2024-06-12',
            'time' => '07:00 - 12:00',
            'location' => 'Pantai Kenjeran, Surabaya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailAcara::create([
            'event_id' => $kenjeran->id,
            'schedule' => [
                [
                    'title' => 'Pembersihan Sampah dibibir Pantai',
                    'time' => '07:00 - 09:00',
                    'description' => 'Ayo buat Kenjeran menjadi bersih dan terhindar dari abrasi!'
                ],
                [
                    'title' => 'Recycling Workshop',
                    'time' => '09:00 - 11:00',
                    'description' => 'Belajar mengubah sampah pantai menjadi barang yang berguna.'
                ],
                [
                    'title' => 'Expert Talks',
                    'time' => '11:00 - 12:00',
                    'description' => 'Sesi penutup yang menghadirkan pembicara dengan tema kebersihan.'
                ]
            ],
            'gallery' => ['gallery1.jpg', 'gallery2.jpg', 'gallery3.jpg']
        ]);

        // 2. Jaddih Bersih
        $jaddih = Event::create([
            'title' => 'Jaddih Bersih',
            'slug' => 'jaddih-bersih',
            'description' => 'Ayo bergabung dan jadilah pahlawan kebersihan Bukit Jaddih',
            'image' => 'event1.jpg',
            'date' => '2024-06-10',
            'time' => '08:00 - 12:00',
            'location' => 'Bukit Jaddih, Bangkalan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailAcara::create([
            'event_id' => $jaddih->id,
            'schedule' => [
                [
                    'title' => 'Pembersihan sampah di pinggir bukit',
                    'time' => '08:00 - 09:00',
                    'description' => 'Pembersihan bukit dari sampah - sampah wisatawan.'
                ],
                [
                    'title' => 'Penambahan Fasilitas Kebersihan',
                    'time' => '09:00 - 11:00',
                    'description' => 'Menambahkan tong sampah dan tanda buang sampah pada tempatnya.'
                ],
                [
                    'title' => 'Expert Talks',
                    'time' => '11:00 - 12:00',
                    'description' => 'Sesi penutup yang menghadirkan pembicara dengan tema kebersihan.'
                ]
            ],
            'gallery' => ['gallery1.jpg', 'gallery2.jpg', 'gallery3.jpg']
        ]);

        // 3. Penyaluran Donasi
        $donasi = Event::create([
            'title' => 'Penyaluran Donasi',
            'slug' => 'penyaluran-donasi',
            'description' => 'Ayo bergabung dan jadilah penyalur alat kebersihan.',
            'image' => 'event3.jpg',
            'date' => '2024-06-20',
            'time' => '09:00 - 15:00',
            'location' => 'Dinas Kebersihan dan Pertamanan Surabaya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailAcara::create([
            'event_id' => $donasi->id,
            'schedule' => [
                [
                    'title' => 'Sambutan',
                    'time' => '09:00 - 10:00',
                    'description' => 'Sambutan dari ketua Green Ranger dan Kepala Dinas Kebersihan dan Pertamanan Surabaya'
                ],
                [
                    'title' => 'Penyaluran Donasi',
                    'time' => '10:00 - 12:00',
                    'description' => 'Penyaluran donasi dari hasil donasi di Green Ranger.'
                ],
                [
                    'title' => 'Sharing Talks',
                    'time' => '12:00 - 15:00',
                    'description' => 'Sesi sharing dari ketua Green Ranger dan Kepala Dinas Kebersihan dan Pertamanan Surabaya'
                ]
            ],
            'gallery' => ['gallery1.jpg', 'gallery2.jpg', 'gallery3.jpg']
        ]);

        // 4. Seminar Pelestarian Lingkungan
        $seminar = Event::create([
            'title' => 'Seminar Pelestarian Lingkungan',
            'slug' => 'seminar-pelestarian-lingkungan',
            'description' => 'Seminar tentang pentingnya pelestarian lingkungan untuk masa depan.',
            'image' => 'event4.jpg',
            'date' => '2024-07-05',
            'time' => '08:00 - 13:00',
            'location' => 'Aula Gedung Serba Guna Surabaya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailAcara::create([
            'event_id' => $seminar->id,
            'schedule' => [
                [
                    'title' => 'Registrasi dan Pembukaan',
                    'time' => '08:00 - 09:00',
                    'description' => 'Registrasi peserta dan pembukaan acara seminar.'
                ],
                [
                    'title' => 'Pemaparan Materi oleh Ahli Lingkungan',
                    'time' => '09:00 - 11:00',
                    'description' => 'Pemaparan materi tentang pentingnya pelestarian lingkungan hidup.'
                ],
                [
                    'title' => 'Diskusi Interaktif',
                    'time' => '11:00 - 12:30',
                    'description' => 'Sesi tanya jawab dan diskusi interaktif dengan peserta.'
                ],
                [
                    'title' => 'Penutup dan Foto Bersama',
                    'time' => '12:30 - 13:00',
                    'description' => 'Penutupan acara dan foto bersama seluruh peserta.'
                ]
            ],
            'gallery' => ['gallery1.jpg', 'gallery2.jpg', 'gallery3.jpg']
        ]);
    }
}
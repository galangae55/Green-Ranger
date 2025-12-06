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
        // 1. Kenjeran Clean - SESUAIKAN PATH GAMBAR
        $kenjeran = Event::create([
            'title' => 'Kenjeran Clean',
            'slug' => 'kenjeran-clean',
            'description' => 'Ayo bergabung dan jadilah pahlawan kebersihan Pantai Kenjeran',
            'image' => 'events/event2.jpg', // Tambahkan 'events/' di depan
            'date' => '2024-06-12',
            'time' => '07:00 - 12:00',
            'location' => 'Pantai Kenjeran, Surabaya',
            'created_at' => Carbon::parse('2025-11-10 16:29:00'),
            'updated_at' => Carbon::parse('2025-11-10 16:29:00'),
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
            'gallery' => [
                'events/gallery/kenjeran1.jpg',
                'events/gallery/kenjeran2.jpg',
                'events/gallery/kenjeran3.jpg'
            ],
            'created_at' => Carbon::parse('2025-11-10 16:29:00'),
            'updated_at' => Carbon::parse('2025-11-10 16:29:00'),
        ]);

        // 2. Jaddih Bersih - SESUAIKAN PATH GAMBAR
        $jaddih = Event::create([
            'title' => 'Jaddih Bersih',
            'slug' => 'jaddih-bersih',
            'description' => 'Ayo bergabung dan jadilah pahlawan kebersihan Bukit Jaddih',
            'image' => 'events/event1.jpg', // Tambahkan 'events/' di depan
            'date' => '2024-06-10',
            'time' => '08:00 - 12:00',
            'location' => 'Bukit Jaddih, Bangkalan',
            'created_at' => Carbon::parse('2025-11-10 16:29:00'),
            'updated_at' => Carbon::parse('2025-11-10 16:29:00'),
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
            'gallery' => [
                'events/gallery/jaddih1.jpg',
                'events/gallery/jaddih2.jpg',
                'events/gallery/jaddih3.jpg'
            ],
            'created_at' => Carbon::parse('2025-11-10 16:29:00'),
            'updated_at' => Carbon::parse('2025-11-10 16:29:00'),
        ]);

        // 3. Penyaluran Donasi - SESUAIKAN PATH GAMBAR
        $donasi = Event::create([
            'title' => 'Penyaluran Donasi',
            'slug' => 'penyaluran-donasi',
            'description' => 'Ayo bergabung dan jadilah penyalur alat kebersihan.',
            'image' => 'events/event3.jpg', // Tambahkan 'events/' di depan
            'date' => '2024-06-20',
            'time' => '09:00 - 15:00',
            'location' => 'Dinas Kebersihan dan Pertamanan Surabaya',
            'created_at' => Carbon::parse('2025-11-10 16:29:00'),
            'updated_at' => Carbon::parse('2025-11-10 16:29:00'),
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
            'gallery' => [
                'events/gallery/donasi1.jpg',
                'events/gallery/donasi2.jpg',
                'events/gallery/donasi3.jpg'
            ],
            'created_at' => Carbon::parse('2025-11-10 16:29:00'),
            'updated_at' => Carbon::parse('2025-11-10 16:29:00'),
        ]);

        // 4. Seminar Pelestarian Lingkungan - SESUAIKAN PATH GAMBAR
        $seminar = Event::create([
            'title' => 'Seminar Pelestarian Lingkungan',
            'slug' => 'seminar-pelestarian-lingkungan',
            'description' => 'Seminar tentang pentingnya pelestarian lingkungan untuk masa depan.',
            'image' => 'events/event4.jpg', // Tambahkan 'events/' di depan
            'date' => '2024-07-05',
            'time' => '08:00 - 13:00',
            'location' => 'Aula Gedung Serba Guna Surabaya',
            'created_at' => Carbon::parse('2025-11-10 16:29:00'),
            'updated_at' => Carbon::parse('2025-11-10 16:29:00'),
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
            'gallery' => [
                'events/gallery/seminar1.jpg',
                'events/gallery/seminar2.jpg',
                'events/gallery/seminar3.jpg'
            ],
            'created_at' => Carbon::parse('2025-11-10 16:29:00'),
            'updated_at' => Carbon::parse('2025-11-10 16:29:00'),
        ]);

        // 5. Beberes Kampung - EVENT BARU YANG ADA DI DATABASE
        $kampung = Event::create([
            'title' => 'beberes kampung',
            'slug' => 'beberes-kampung',
            'description' => 'membersihkan kampung dari jahanam jahanam',
            'image' => 'events/Y26HoTpf9SOxeUGYQ3pWAxWDsVdOvB1UE8bxS8ug.jpg',
            'date' => '2026-01-10',
            'time' => '10:00',
            'location' => 'kampung saya',
            'created_at' => Carbon::parse('2025-12-02 15:19:37'),
            'updated_at' => Carbon::parse('2025-12-02 15:19:37'),
        ]);

        DetailAcara::create([
            'event_id' => $kampung->id,
            'schedule' => [
                [
                    'title' => 'Pembersihan Jalan',
                    'time' => '10:00 - 11:00',
                    'description' => 'Membersihkan jalan utama kampung'
                ],
                [
                    'title' => 'Pembersihan Selokan',
                    'time' => '11:00 - 12:00',
                    'description' => 'Membersihkan selokan dari sampah'
                ],
                [
                    'title' => 'Istirahat dan Makan Siang',
                    'time' => '12:00 - 13:00',
                    'description' => 'Istirahat bersama dan makan siang'
                ]
            ],
            'gallery' => [
                'events/gallery/kampung1.jpg',
                'events/gallery/kampung2.jpg'
            ],
            'created_at' => Carbon::parse('2025-12-02 15:19:37'),
            'updated_at' => Carbon::parse('2025-12-02 15:19:37'),
        ]);

        // 6. Bersih Bersih Gelora - EVENT BARU YANG ADA DI DATABASE
        $gelora = Event::create([
            'title' => 'bersih bersih gelora',
            'slug' => 'bersih-bersih-gelora-',
            'description' => 'kerja bakti membersihkan gelora 10 november dari kotoran',
            'image' => 'events/etMexdFSMTbIgJbzolmIRCCuGOKAUI1bAI5eKp9u.jpg',
            'date' => '2026-01-09',
            'time' => '12:00',
            'location' => 'tambaksari, Surabaya',
            'created_at' => Carbon::parse('2025-12-02 17:29:41'),
            'updated_at' => Carbon::parse('2025-12-02 17:29:41'),
        ]);

        DetailAcara::create([
            'event_id' => $gelora->id,
            'schedule' => [
                [
                    'title' => 'Pembukaan',
                    'time' => '12:00 - 12:30',
                    'description' => 'Briefing dan pembagian tugas'
                ],
                [
                    'title' => 'Pembersihan Area',
                    'time' => '12:30 - 14:30',
                    'description' => 'Membersihkan seluruh area Gelora 10 November'
                ],
                [
                    'title' => 'Penutupan',
                    'time' => '14:30 - 15:00',
                    'description' => 'Penutupan dan foto bersama'
                ]
            ],
            'gallery' => [
                'events/gallery/gelora1.jpg',
                'events/gallery/gelora2.jpg',
                'events/gallery/gelora3.jpg'
            ],
            'created_at' => Carbon::parse('2025-12-02 17:29:41'),
            'updated_at' => Carbon::parse('2025-12-02 17:29:41'),
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class metode_pengiriman extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metode_pengiriman')->insert([
            ['name' => 'Standard Shipping', 'price' => 79900],   // 79.900 Rupiah
            ['name' => 'Express Shipping', 'price' => 149900],   // 149.900 Rupiah
            ['name' => 'Next-Day Delivery', 'price' => 299900],  // 299.900 Rupiah
        ]);
    }
}

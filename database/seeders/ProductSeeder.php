<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Topi Rajut Pria',
            'price' => 159999,
            'image' => 'images/img/shop/item01.jpg', // path gambar yang disimpan di folder public/images
        ]);

        Product::create([
            'name' => 'Topi Rajut Wanita',
            'price' => 199999,
            'image' => 'images/img/shop/item02.jpg',
        ]);

        Product::create([
            'name' => 'Kursi Santai Jati Mix Rotan',
            'price' => 780000,
            'image' => 'images/img/shop/item03.jpg',
        ]);

        Product::create([
            'name' => 'Lampu Hias Anyaman',
            'price' => 1500000,
            'image' => 'images/img/shop/item04.jpg',
        ]);

        Product::create([
            'name' => 'keranjang Belanja',
            'price' => 100000,
            'image' => 'images/img/shop/item05.jpg',
        ]);

        Product::create([
            'name' => 'Tottebag Denim',
            'price' => 233000,
            'image' => 'images/img/shop/item06.jpg',
        ]);

        Product::create([
            'name' => 'Lampu Botol',
            'price' => 800000,
            'image' => 'images/img/shop/item07.jpg',
        ]);

        Product::create([
            'name' => 'Hiasan kepala Binatang',
            'price' => 499000,
            'image' => 'images/img/shop/item08.jpg',
        ]);
        Product::create([
            'name' => 'Rompi Plastik',
            'price' => 330000,
            'image' => 'images/img/shop/item09.jpg',
        ]);
        Product::create([
            'name' => 'Peralatan Makan Kayu',
            'price' => 50000,
            'image' => 'images/img/shop/item10.jpg',
        ]);
        Product::create([
            'name' => 'Gayung Batok kelapa',
            'price' => 20000,
            'image' => 'images/img/shop/item11.jpg',
        ]);
        Product::create([
            'name' => 'Tas Rajut Eceng Gondok',
            'price' => 299999,
            'image' => 'images/img/shop/item12.jpg',
        ]);
    }
}

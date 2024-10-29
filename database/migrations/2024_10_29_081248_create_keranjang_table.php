<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // ID keranjang
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID pengguna yang berelasi dengan tabel users
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // ID produk yang berelasi dengan tabel products
            $table->integer('quantity'); // Jumlah pesanan
            $table->decimal('total_price', 10, 2); // Total harga
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
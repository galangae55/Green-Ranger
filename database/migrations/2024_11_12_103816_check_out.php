<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('metode_pengiriman_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('billing_address_1');
            $table->text('billing_address_2')->nullable();
            $table->string('billing_city');
            $table->string('billing_postcode');
            $table->string('billing_phone');
            $table->decimal('subtotal', 10, 2)->default(0); // Harga seluruh barang
            $table->decimal('total_akhir', 10, 2)->default(0); // Total akhir setelah biaya pengiriman
            $table->enum('status', ['Gagal', 'Belum Dibayar', 'Sedang Diproses', 'Sedang Dikirim', 'Diterima']);
            $table->text('order_comments')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('metode_pengiriman_id')->references('id')->on('metode_pengiriman')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

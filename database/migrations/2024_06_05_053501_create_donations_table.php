<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis unik
            $table->string('name'); // Nama donatur
            $table->string('phone', 12); // Nomor telepon
            $table->string('email'); // Email donatur
            $table->integer('amount'); // Jumlah donasi
            $table->string('status'); // Status donasi (pending, done, failed)
            $table->string('order_id')->unique(); // Kolom order_id, unik untuk setiap transaksi
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donations');
    }
}



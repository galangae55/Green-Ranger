<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_detail_acara_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAcaraTable extends Migration
{
    public function up()
    {
        Schema::create('detail_acara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->json('schedule')->nullable(); // Untuk menyimpan susunan acara
            $table->json('gallery')->nullable(); // Untuk menyimpan galeri gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_acara');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID pengguna yang mendaftar
            $table->string('username'); // Menyimpan username
            $table->integer('umur');
            $table->string('no_telp');
            $table->string('email');
            $table->string('event');
            $table->enum('status', ['pending', 'accepted']); // Status volunteer
            $table->timestamps();

            // Foreign key constraint (opsional)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
}



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
        Schema::create('chat_message_images', function (Blueprint $table) {
            $table->uuid('id')->primary();// Membuat kolom 'id' dengan tipe data UUID dan menjadikannya primary key.

            // Membuat kolom 'chat_message_id' dengan tipe data UUID yang merujuk ke kolom 'id' pada tabel 'chat_messages'.
            // Jika pesan yang terkait dihapus, maka semua gambar yang terkait dengan pesan tersebut juga akan dihapus.
            $table->foreignUuid('chat_message_id')->references('id')->on('chat_messages')->onDelete('cascade');
            $table->string('name'); // Membuat kolom 'name' dengan tipe data string untuk menyimpan nama gambar.
            $table->string('path'); // Membuat kolom 'path' dengan tipe data string untuk menyimpan path gambar.
            $table->timestamps(); // Menambahkan kolom 'created_at' dan 'updated_at' secara otomatis untuk melacak waktu pembuatan dan pembaruan gambar.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_message_images');
    }
};

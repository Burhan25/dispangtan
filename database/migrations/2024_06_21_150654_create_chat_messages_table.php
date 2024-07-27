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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->uuid('id')->primary();// Membuat kolom 'id' dengan tipe data UUID dan menjadikannya primary key.

            // Membuat kolom 'chat_id' dengan tipe data UUID yang merujuk ke kolom 'id' pada tabel 'chats'.
            // Jika chat yang terkait dihapus, maka semua pesan yang terkait dengan chat tersebut juga akan dihapus.
            $table->foreignUuid('chat_id')->references('id')->on('chats')->onDelete('cascade');

            // Membuat kolom 'user_id' dengan tipe data foreign key yang merujuk ke kolom 'id' pada tabel 'users'.
            // Jika pengguna yang terkait dihapus, maka semua pesan yang dibuat oleh pengguna tersebut juga akan dihapus.
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            // Membuat kolom 'message' dengan tipe data teks untuk menyimpan isi pesan.
            $table->text('message');

            // Menambahkan kolom 'created_at' dan 'updated_at' secara otomatis untuk melacak waktu pembuatan dan pembaruan pesan.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};

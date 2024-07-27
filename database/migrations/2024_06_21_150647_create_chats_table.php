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
        Schema::create('chats', function (Blueprint $table) {
            $table->uuid('id')->primary();// Membuat kolom 'id' dengan tipe data UUID dan menjadikannya primary key.
            $table->string('title');// Membuat kolom 'title' dengan tipe data string untuk menyimpan judul chat.
            $table->string('category');// Membuat kolom 'category' dengan tipe data string untuk menyimpan kategori chat.
            $table->boolean('replied');// Membuat kolom 'replied' dengan tipe data boolean untuk menyimpan status apakah chat telah dibalas atau belum.
            // Membuat kolom 'created_by' dengan tipe data foreign key yang merujuk ke kolom 'id' pada tabel 'users'.
            // Jika pengguna yang terkait dihapus, maka semua chat yang dibuat oleh pengguna tersebut juga akan dihapus.
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();// Menambahkan kolom 'created_at' dan 'updated_at' secara otomatis untuk melacak waktu pembuatan dan pembaruan chat.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats'); // Menghapus tabel 'chats' jika ada.
    }
};

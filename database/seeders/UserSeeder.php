<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>null,
            'password'=>Hash::make('admin123'),
            'status'=>0,
            'role'=>UserRole::ADMIN,
        ]);
        User::query()->create([
            'name'=>'Dokter',
            'email'=>'dokter@gmail.com',
            'email_verified_at'=>null,
            'password'=>Hash::make('dokter123'),
            'status'=>0,
            'role'=>UserRole::DOKTER,
        ]);
        User::query()->create([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'email_verified_at'=>null,
            'password'=>Hash::make('user123'),
            'status'=>0,
            'role'=>UserRole::USER,
        ]);
    }
}

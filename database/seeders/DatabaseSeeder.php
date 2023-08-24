<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\pembayaran;
use App\Models\pesanan;
use App\Models\User;
use App\Models\produk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        produk::create([
            "id" => "1",
            "nama" => "Ayam Broiler",
            "deskripsi" => "Memiliki daging yang lezat, dan empuk cocok untuk berbagai masakan kuliner",
            "harga" => 50000,
            'foto' => 'Ayam1.png',
            "stok" => 60
        ]);
        produk::create([
            "id" => "2",
            "nama" => "Bibit ayam Broiler",
            "deskripsi" => "Bibit ayam broiler berkualitas tinggi, cepat tumbuh, dan berpotensi memberikan hasil panen optimal.",
            "harga" => 20000,
            'foto' => 'bibitAyam.png',
            "stok" => 30
        ]);
        produk::create([
            "id" => "3",
            "nama" => "Pakan Ayam",
            "deskripsi" => "(Per 20KG) Pakan ayam broiler berkualitas tinggi, kaya nutrisi, dan dirancang khusus untuk pertumbuhan optimal.",
            "harga" => 100000,
            'foto' => 'pakanAyam.png',
            "stok" => 40
        ]);
        User::create([
            "id" => "1",
            "name" => "admin",
            "alamat" => "hehe",
            "noTelp" => "0123456789",
            "email" => "admin@gmail.com",
            "role" => "admin",
            "password" => bcrypt('admin')
        ]);
        User::create([
            "id" => "2",
            "name" => "karyawan",
            "alamat" => "hoho",
            "noTelp" => "0123456789",
            "email" => "karyawan@gmail.com",
            "role" => "karyawan",
            "password" => bcrypt('karyawan')
        ]);
        User::create([
            "id" => "3",
            "name" => "user",
            "alamat" => "hoho",
            "noTelp" => "0123456789",
            "email" => "user@gmail.com",
            "role" => "user",
            "password" => bcrypt('user')
        ]);
        pembayaran::create([
            "id" => "1",
            "idUser" => "1",
            "metodePembayaran" => "COD",
            "status" => "Pending"
        ]);
        pembayaran::create([
            "id" => "2",
            "idUser" => "2",
            "metodePembayaran" => "COD",
            "status" => "Pending"
        ]);
        pesanan::create([
            "id" => "1",
            "idPembayaran" => "1",
            "idProduk" => "1",
            "jumlah" => 2,
        ]);
        pesanan::create([
            "id" => "2",
            "idPembayaran" => "1",
            "idProduk" => "2",
            "jumlah" => 3,
        ]);
        pesanan::create([
            "id" => "3",
            "idPembayaran" => "2",
            "idProduk" => "3",
            "jumlah" => 4,
        ]);
    }
}

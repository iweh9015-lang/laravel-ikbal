<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProducSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        Produk::create([
            'nama_produk' => 'Chiki',
            'harga' => 2000,
            'stok' => 50,
        ]);

        Produk::create([
            'nama_produk' => 'Indomie Goreng',
            'harga' => 3500,
            'stok' => 100,
        ]);

        Produk::create([
            'nama_produk' => 'Oreo',
            'harga' => 8000,
            'stok' => 30,
        ]);

        Produk::create([
            'nama_produk' => 'Susu Ultra',
            'harga' => 7000,
            'stok' => 25,
        ]);

        Produk::create([
            'nama_produk' => 'Aqua Botol',
            'harga' => 5000,
            'stok' => 120,
        ]);
    }
}

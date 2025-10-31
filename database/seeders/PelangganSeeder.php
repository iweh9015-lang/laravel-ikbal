<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggans = [
            [
                'nama' => 'Andi Pratama',
                'no_telp' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 12, Bandung',
            ],
            [
                'nama' => 'Siti Aisyah',
                'no_telp' => '082233445566',
                'alamat' => 'Jl. Sudirman No. 23, Jakarta',
            ],
            [
                'nama' => 'Rizky Ramadhan',
                'no_telp' => '085322334455',
                'alamat' => 'Jl. Ahmad Yani No. 45, Surabaya',
            ],
            [
                'nama' => 'Dewi Lestari',
                'no_telp' => '083312223344',
                'alamat' => 'Jl. Pahlawan No. 7, Yogyakarta',
            ],
            [
                'nama' => 'Budi Santoso',
                'no_telp' => '081355667788',
                'alamat' => 'Jl. Gajah Mada No. 19, Semarang',
            ],
        ];

        foreach ($pelanggans as $pelanggan) {
            Pelanggan::create($pelanggan);
        }
    }
}

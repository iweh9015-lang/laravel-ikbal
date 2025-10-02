<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kendaraan = [
            ['merk' => 'Yamaha', 'jenis_kendaraan' => 'Aerox 155', 'harga' => 500000000, 'garansi' => '5 Tahun', 'stok' => 10],
            ['merk' => 'Honda', 'jenis_kendaraan' => 'Vario150', 'harga' => 400000000, 'garansi' => '4 Tahun', 'stok' => 15],
            ['merk' => 'Suzuki', 'jenis_kendaraan' => 'Tornado GS', 'harga' => 300000000, 'garansi' => '3 Tahun', 'stok' => 20],
            ['merk' => 'Kawasaki', 'jenis_kendaraan' => 'MPV', 'harga' => 350000000, 'garansi' => '4 Tahun', 'stok' => 12],
            ['merk' => 'Yamaha', 'jenis_kendaraan' => 'Rx-king 135', 'harga' => 600000000, 'garansi' => '5 Tahun', 'stok' => 8],
        ];
        DB::table('kendaraan')->insert($kendaraan);
    }
}

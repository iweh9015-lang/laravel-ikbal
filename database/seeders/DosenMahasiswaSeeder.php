<?php
// database/seeders/DosenMahasiswaSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class DosenMahasiswaSeeder extends Seeder
{
    public function run()
    {
        $dosen1 = Dosen::create([
            'nama' => 'Dr. Andi Nugraha',
            'nipd' => 'D001'
        ]);

        $dosen2 = Dosen::create([
            'nama' => 'Prof. Siti Rahmawati',
            'nipd' => 'D002'
        ]);

        // Tambahkan mahasiswa ke masing-masing dosen
        $dosen1->mahasiswas()->createMany([
            ['nama' => 'Candra Herdiansyah', 'nim' => '123456'],
            ['nama' => 'Rizky Ramadhan', 'nim' => '123457'],
        ]);

        $dosen2->mahasiswas()->createMany([
            ['nama' => 'Nur Aisyah', 'nim' => '123458'],
            ['nama' => 'Dewi Pertiwi', 'nim' => '123459'],
        ]);
    }
}


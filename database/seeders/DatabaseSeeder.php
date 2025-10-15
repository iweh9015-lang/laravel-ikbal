<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
{
    //pemanggilan class sample data
    $this->call(PostTableseeder::class);   
    $this->call(KendaraanTableseeder::class);

    $dosen1 = Dosen::create(['nama' => 'Ibu Ratna Dewi']);
    $dosen2 = Dosen::create(['nama' => 'Pak Joko Widodo']);

    $andi = Mahasiswa::create([
        'nama' => 'Andi Pratama',
        'nim' => '20241001',
        'kelas' => 'RPL 1',
        'dosen_id' => $dosen1->id
    ]);

    $siti = Mahasiswa::create([
        'nama' => 'Siti Aisyah',
        'nim' => '20241002',
        'kelas' => 'TKJ 2',
        'dosen_id' => $dosen2->id
    ]);

    Wali::create(['nama' => 'Budi Santoso', 'mahasiswa_id' => $andi->id]);
    Wali::create(['nama' => 'Agus Haryono', 'mahasiswa_id' => $siti->id]);

    $baca = Hobi::create(['nama' => 'Membaca']);
    $coding = Hobi::create(['nama' => 'Coding']);
    $menulis = Hobi::create(['nama' => 'Menulis']);

    $andi->hobis()->attach([$baca->id, $coding->id]);
    $siti->hobis()->attach([$menulis->id]);
}

}

<?php

namespace App\Http\Controllers;

class Mycontroller extends Controller
{
    public function Hello()
    {
        $nama = 'ikbal';
        $umur = '16';

        return view('hello', compact('nama', 'umur'));
    }

    public function siswa()
    {
        $data = [
            ['nama' => 'rehan', 'kelas' => 'XI RPL 3'],
            ['nama' => 'dadan', 'kelas' => 'XI RPL 3'],
            ['nama' => 'didin', 'kelas' => 'XI RPL 1'],
        ];

        return view('siswa', compact('data'));
    }
}

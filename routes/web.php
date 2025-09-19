<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 
// basic

Route::get('about', function () {
    return '<h1>Hallo</h1><br>Selamat datanng di perpustakaan digital';
});

//balajar rooting laravel

Route::get('perkenalan', function () {
    return '<h1>Perkenalan</h1><br>Nama saya Ikbal Alimmujiawan Pebiyansyah<br> saya kelas XI RPL 3
    <br>Saya bersekolah di SMK ASSALAAM BANDUNG<br> Alamat Saya Di Kp Cilokotot Rt 2 Rw 2';
});

//buku

Route::get('buku', function () {
    return '<br>Ini buku saya';
});

Route::get('menu', function () {
    $data = [
        ['nama_makanan' => 'Bala-bala', 'harga' => 1000, 'jumlah' => 10],
        ['nama_makanan' => 'Gehu Pedas', 'harga' => 2000, 'jumlah' => 20],
        ['nama_makanan' => 'Cireng Isi Ayam', 'harga' => 4000, 'jumlah' => 40],
    ];
    $resto = "Resto MLP - Makanan Penuh Lemak";

    return view('menu', compact('data', 'resto'));
});
//route parameter
route::get ('books/{judul}', function ($a){
    return 'Judul Buku : '.$a;
});

Route::get('post/{title}/{category}', function ($a, $b) {
    return view('post', ['judul' => $a, 'cat' => $b]);
});

// optionsl parameter
//ditandai dengan tanda tangan

Route::get('profile/{name?}', function ($a = 'guest') {
    return 'Hallo nama saya : ' . $a;
});

//memesan makanan
route::get('order/{item?}', function ($a = "nasi"){
    return view('order', compact('a'));
});

//tugas latihan

//soal ke 1
Route::get('toko', function () {
    $data = [
        ['nama_barang' => 'Buku', 'harga' => 15000, 'jumlah' => 2],
        ['nama_barang' => 'Pensil', 'harga' => 3000, 'jumlah' => 5],
        ['nama_barang' => 'Penggaris', 'harga' => 7000, 'jumlah' => 1],
    ];
    $toko = "Toko Alat Tulis";

    return view('toko', compact('data', 'toko'));
});

//soal ke 2

route::get('kelulusan/{nama?}/{mapel?}/{nilai?}', function ($a, $b, $c = "Tidak ada nilai" ) {
    return view ('kelulusan', compact('a', 'b', 'c'));
});
//soal ke 3
route::get('grading/{nama?}/{nilai?}', function ($a = "Guest", $b = 0) {
    if ($b >= 90) {
        $grade = "A";
    } elseif ($b >= 80) {
        $grade = "B";
    } elseif ($b >= 70) {
        $grade = "C";
    } elseif ($b >= 60) {
        $grade = "D";
    } else {
        $grade = "E";
    }
    return view('grading', compact('a', 'b', 'grade'));
});

//soal ke 4
Route::get('status', function () {
    $data = [
        ['nama' => 'andi', 'nilai' => 85],
        ['nama' => 'budi', 'nilai' => 70],
        ['nama' => 'citra', 'nilai' => 95],
    ];
    return view('status', compact('data'));
});



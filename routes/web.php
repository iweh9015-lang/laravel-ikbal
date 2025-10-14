<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\Postcontroller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// basic

Route::get('about', function () {
    return '<h1>Hallo</h1><br>Selamat datanng di perpustakaan digital';
});

// belajar routing laravel
Route::get('perkenalan', function () {
    return '<h1>Perkenalan</h1><br>Nama saya Ikbal Alimmujiawan Pebiyansyah<br> saya kelas XI RPL 3
    <br>Saya bersekolah di SMK ASSALAAM BANDUNG<br> Alamat Saya Di Kp Cilokotot Rt 2 Rw 2';
});

// buku
Route::get('buku', function () {
    return '<br>Ini buku saya';
});

Route::get('menu', function () {
    $data = [
        ['nama_makanan' => 'Bala-bala', 'harga' => 1000, 'jumlah' => 10],
        ['nama_makanan' => 'Gehu Pedas', 'harga' => 2000, 'jumlah' => 20],
        ['nama_makanan' => 'Cireng Isi Ayam', 'harga' => 4000, 'jumlah' => 40],
    ];
    $resto = 'Resto MLP - Makanan Penuh Lemak';

    return view('menu', compact('data', 'resto'));
});

// route parameter
Route::get('books/{judul}', function ($a) {
    return 'Judul Buku : '.$a;
});

// Route::get('post/{title}/{category}', function ($a, $b) {
// return view('post', ['judul' => $a, 'cat' => $b]);
// });

// optional parameter
Route::get('profile/{name?}', function ($a = 'guest') {
    return 'Hallo nama saya : '.$a;
});

// memesan makanan
Route::get('order/{item?}', function ($a = 'nasi') {
    return view('order', compact('a'));
});

// tugas latihan

// soal ke 1
Route::get('toko', function () {
    $data = [
        ['nama_barang' => 'Buku', 'harga' => 15000, 'jumlah' => 2],
        ['nama_barang' => 'Pensil', 'harga' => 3000, 'jumlah' => 5],
        ['nama_barang' => 'Penggaris', 'harga' => 7000, 'jumlah' => 1],
    ];
    $toko = 'Toko Alat Tulis';

    return view('toko', compact('data', 'toko'));
});

// soal ke 2
Route::get('kelulusan/{nama?}/{mapel?}/{nilai?}', function ($a = null, $b = null, $c = 'Tidak ada nilai') {
    return view('kelulusan', compact('a', 'b', 'c'));
});

// soal ke 3
Route::get('grading/{nama?}/{nilai?}', function ($a = 'Guest', $b = 0) {
    if ($b >= 90) {
        $grade = 'A';
    } elseif ($b >= 80) {
        $grade = 'B';
    } elseif ($b >= 70) {
        $grade = 'C';
    } elseif ($b >= 60) {
        $grade = 'D';
    } else {
        $grade = 'E';
    }

    return view('grading', compact('a', 'b', 'grade'));
});

// soal ke 4
Route::get('status', function () {
    $data = [
        ['nama' => 'andi', 'nilai' => 85],
        ['nama' => 'budi', 'nilai' => 70],
        ['nama' => 'citra', 'nilai' => 95],
    ];

    return view('status', compact('data'));
});

// tes model
Route::get('test-model', function () {
    // menampilkan semua data dari model post
    $data = Post::all();

    return $data;
});

Route::get('create-data', function () {
    // membuat data baru melalui model
    $data = Post::create([
        'title' => 'Belajar PHP',
        'content' => 'lorem ipsum',
    ]);

    return $data;
});

Route::get('show-data/{id}', function ($id) {
    // menampilkan 1 data berdasarkan id
    $data = Post::find($id);

    return $data;
});

Route::get('edit-data/{id}', function ($id) {
    // mengedit data berdasarkan id
    $data = Post::find($id);
    $data->title = 'Membangun Project Dengan laravel';
    $data->save();

    return $data;
});

Route::get('delete-data/{id}', function ($id) {
    // menghapus data berdasarkan id
    $data = Post::find($id);
    $data->delete();

    return redirect('test-model');
});

Route::get('search/{cari}', function ($query) {
    // mencari data berdasarkan title yang mirip seperi (like).......
    $data = Post::where('title', 'like', '%'.$query.'%')->get();

    return $data;
});

// pemanggilan url menggunaka controller
Route::get('greetings', [MyController::class, 'hello']);

Route::get('student', [MyController::class, 'siswa']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// post
Route::get('post', [Postcontroller::class, 'index'])->name('post.index');
// tambah data post
Route::get('post/create', [Postcontroller::class, 'create'])->name('post.create');
Route::post('post', [Postcontroller::class, 'store'])->name('post.store');
// edit data post
Route::get('post/{id}/edit', [Postcontroller::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [Postcontroller::class, 'update'])->name('post.update');

// show data
Route::get('post/{id}', [Postcontroller::class, 'show'])->name('post.show');

// produk
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

// hapus data
Route::delete('post/{id}', [Postcontroller::class, 'destroy'])->name('post.delete');
// biodata
use App\Http\Controllers\BiodataController;

Route::get('/', function () {
    return redirect()->route('biodata.index');
});

Route::resource('biodata', BiodataController::class);

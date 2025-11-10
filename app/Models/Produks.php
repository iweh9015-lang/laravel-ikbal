<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
    ];

    public function transaksis()
    {
        // membuat relasi many to many ke transaksi melalui table detail_transaksi
        // tang di wakili oleh id_produk dan id_transaksi
        // dan bisa melampir kan jumlah, sub total & tanggal created_at dan updated_at
        return $this->belongToMany(Transaksi::class)->withPivot('detail_transaksi', 'id_produk', 'id_transaksi')
            ->withPivot('jumlah', 'sub_total')
            ->withTimestamps();
    }
}
// <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode',
        'id_pelanggan',
        'id_produk',
        'jumlah',
        'total_harga',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'detail_transaksi', 'id_transaksi', 'id_produk')
        ->withPivot('jumlah', 'sub_total')
        ->withTimestamps();
    }
}

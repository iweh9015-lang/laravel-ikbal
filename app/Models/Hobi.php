<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Tambahkan ini

class Hobi extends Model
{
    protected $fillable = ['nama_hobi'];

    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_hobi', 'id_hobi', 'id_mahasiswa');
    }
}

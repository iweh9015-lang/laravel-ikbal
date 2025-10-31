<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans'; // pastikan ini sama dengan nama tabel
  protected $fillable = ['nama', 'alamat', 'telepon'];

}

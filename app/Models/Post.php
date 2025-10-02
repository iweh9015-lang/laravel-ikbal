<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //secara otomatis model ini menganggap
    //tabble yang digunakan adalah tabel 'post'

    //table yanng digunakan unutk model ini adalah table 'post'
    protected $table = 'post';

    //apa saja yang boleh di isi
    public $fillable = ['title', 'content'];

    //apa saja yang boleh di perlihatkan
    public $visible = ['id','title', 'content'];

    //mengisi tanggal kapan di buat dan kapan di update otomatis
    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKurir extends Model
{
    protected $table = 'data_kurirs';
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'alamat', 'tempat_lahir'
    , 'tanggal_lahir', 'no_ponsel', 'gambar'];
}

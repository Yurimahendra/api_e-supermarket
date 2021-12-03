<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenjual extends Model
{
    protected $table = 'data_penjuals';
    protected $fillable = ['nik', 'nama', 'email', 'jenis_kelamin', 'alamat', 'tempat_lahir'
    , 'tanggal_lahir', 'no_ponsel', 'nama_toko', 'gambar'];
}

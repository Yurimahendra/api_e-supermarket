<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataProduk extends Model
{
    protected $table = 'data_produks';
   // protected $fillable = ['id', 'nama_barang', 'merk', 'harga', 'satuan', 'stok', 'gambar', 'deskripsi', 'created_at','updated_at'];
    protected $fillable = ['nama_barang', 'merk', 'harga', 'satuan', 'stok', 'gambar', 'deskripsi'];
}

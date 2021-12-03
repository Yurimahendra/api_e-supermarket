<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataOrderan extends Model
{
    protected $table = 'data_orderans';
    protected $fillable = ['order_id', 'nama', 'no_hp', 'alamat', 'nama_barang', 'jumlah_pesanan','ongkir'
    , 'total_harga', 'metode_pembayaran', 'status'];
}

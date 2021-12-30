<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // variabel $tabel
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    static $rules = [
        'metode_pembayaran' => 'required',
        'jumlah_pembelian' => 'required',
        'nama_pembeli' => 'required',
        'alamat_pembeli' => 'required',
        'email' => 'required',
        'telepon' => 'required'
    ];
    protected $perPage = 10;
    protected $fillable = ['metode_pembayaran' , 'jumlah_pembelian' , 'total_pembayaran' , 'nama_pembeli' , 'alamat_pembeli', 'email' , 'telepon'];
}

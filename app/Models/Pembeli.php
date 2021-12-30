<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    // variabel $tabel
    protected $table = 'pembeli';
    protected $primaryKey = 'id_pembeli';

    // static $rules = [
    //     'metode_pembayaran' => 'required',
    //     'jumlah_pembelian' => 'required',
    //     'total_pembayaran' => 'required',
    //     'nama_pembeli' => 'required',
    //     'alamat_pembeli' => 'required',
    //     'email' => 'required',
    //     'telepon' => 'required'
    // ];
    protected $perPage = 10;
    protected $fillable = ['nama_pembeli' , 'alamat_pembeli', 'email' , 'telepon'];
}

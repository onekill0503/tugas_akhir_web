<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    // variabel $tabel
    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';

    static $rules = [
        'merk' => 'required',
        'seri' => 'required',
        'harga' => 'required',
        'volume_mobil' => 'required',
        'warna' => 'required'
    ];
    protected $perPage = 10;
    protected $fillable = ['merk' , 'seri' , 'harga' , 'volume_mobil' , 'warna'];
}

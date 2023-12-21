<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal','penjualan_id','jumlah','ket',
        ];

        //relasi ke tabel sales
    public function penjualan (){
        return $this->belongsTo(penjualan::class);// relasi many to one 
    }
}

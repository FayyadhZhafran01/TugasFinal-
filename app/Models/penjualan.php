<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kode_penjualan','','tipe_id','pembeli_id','pemilik_id','jumlah_jual','keterangan',
        ];

         //method untuk relasi
    public function tipe(){
        return $this->belongsTo(tipe::class); //jenis relasi many to one
    }

    //method untuk relasi lagi
    public function pembeli (){
        return $this->belongsTo(pembeli::class); //jenis relasi tabel many to one
    }

    //relasi ke tabel sales
    public function pemilik (){
        return $this->belongsTo(pemilik::class);// relasi many to one 
    }

    //method untuk relasional tabel
    public function total_transaksi (){
        return $this->hasMany(total_transaksi::class); //jenis relasi tabel one to many
    }

}

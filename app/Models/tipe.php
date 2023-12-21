<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_mobil','nama_mobil','harga_jual','harga_beli',
        ];

         
        //method untuk relasional tabel
    public function penjualan (){
        return $this->hasMany(penjualan::class); //jenis relasi tabel one to many
    }


}

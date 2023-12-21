<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama','alamat','nomor_hp',
        ];

        //method untuk relasional tabel
    public function penjualan (){
        return $this->hasMany(penjualan::class); //jenis relasi tabel one to many
    }

}

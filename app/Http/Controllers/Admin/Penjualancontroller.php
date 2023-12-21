<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pembeli;
use App\Models\pemilik;
use App\Models\penjualan;
use App\Models\tipe;
use Illuminate\Http\Request;

class Penjualancontroller extends Controller
{
    //method untuk tampilkan data penjualan
    public function index()
    {
        $penjualan = penjualan::latest()->when(request()->q, function ($penjualan) {
            $penjualan = $penjualan->where("kode_penjualan", "like", "%" . request()->q . "%");
        })->paginate(10);
        $penjualan = penjualan::with(['tipe','pemilik','pembeli'])->paginate(10);
        return view("admin.penjualan.index", compact("penjualan"));
    }

    // method untuk panggil form input data
    public function create()
    {
        $tipe = tipe::all();
        $pemilik = pemilik::all();
        $pembeli = pembeli::all();
        return view("admin.penjualan.create", compact('tipe', 'pemilik','pembeli'));
    }

    //method untuk kirim data dari imputan form ke tabel kategori database
    public function store(Request $request)
    {
        //validasi imputan
        $this->validate($request, [
            'kode_penjualan' => 'required',
            'tipe_id' => 'required',
            'pemilik_id' => 'required',
            'pembeli_id' => 'required',
            'jumlah_jual' => 'required',
            'keterangan' => 'required'

        ]);
        //data input disimpan kedalam tabel
        $penjualan = penjualan::create([
            'kode_penjualan' => $request->kode_penjualan,
            'tipe_id' => $request->tipe_id,
            'pemilik_id' => $request->pemilik_id,
            'pembeli_id' => $request->pembeli_id,
            'jumlah_jual' => $request->jumlah_jual,
            'keterangan' => $request->keterangan,
        ]);

        //kondisi
        if ($penjualan) {
            //redirect dengan tampilkan pesan
            return redirect()->route('admin.penjualan.index')->with(['success' => 'Data anda berhasil disimpan di dalam tabel penjualans']);
        } else {

            return redirect()->route('admin.penjualan.index')->with(['error' => 'Data anda gagal disimpan tabel penjualan']);
        }
    }


    //method untuk tampilkan data yang mau diubah
    public function edit(penjualan $penjualan)
    {
        $tipe = tipe::all();
        $pemilik = pemilik::all();
        $pembeli = pembeli::all();
        return view("admin.penjualan.edit", compact('penjualan','tipe', 'pemilik','pembeli'));
    }

    //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request, penjualan $penjualan)
    {
        //validasi imputan
        $request->validate([
            'kode_penjualan' => 'required',
            'tipe_id' => 'required',
            'pemilik_id' => 'required',
            'pembeli_id' => 'required',
            'jumlah_jual' => 'required',
            'keterangan' => 'required'

        ]);

        //update data di tabel kategori dengan data baru

        $penjualan->update([
            'kode_penjualan' => $request->kode_penjualan,
            'tipe_id' => $request->tipe_id,
            'pemilik_id' => $request->pemilik_id,
            'pembeli_id' => $request->pembeli_id,
            'jumlah_jual' => $request->jumlah_jual,
            'keterangan' => $request->keterangan,

        ]);


        //kondisi jika berhasil atau tidak ubah datanya
        if ($penjualan) {
            //redirect dengan tampilkan pesan
            return redirect()->route('admin.penjualan.index')->with(['success' => 'Data anda berhasil disimpan di dalam tabel penjualan ']);
        } else {

            return redirect()->route('admin.penjualan.index')->with(['error' => 'Data anda gagal disimpan tabel penjualan']);
        }

    }

    // method untuk hapus data
    public function destroy($id)
    {
        $penjualan = penjualan::findorfail($id);
        $penjualan->delete();


        //kondisi berhasil atau tidak hapus datanya
        if ($penjualan) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['error' => 'error']);
        }

    }
}

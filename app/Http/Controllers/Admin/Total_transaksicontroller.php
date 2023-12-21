<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\penjualan;
use App\Models\total_transaksi;
use Illuminate\Http\Request;

class Total_transaksicontroller extends Controller
{
    //method untuk tampilkan data penjualan
    public function index()
    {
        $total_transaksi = total_transaksi::latest()->when(request()->q, function ($total_transaksi) {
            $total_transaksi = $total_transaksi->where("kode_penjualan", "like", "%" . request()->q . "%");
        })->paginate(10);
        $total_transaksi = total_transaksi::with(['penjualan'])->paginate(10);
        return view("admin.total_transaksi.index", compact("total_transaksi"));
    }

    // method untuk panggil form input data
    public function create()
    {
        $penjualan = penjualan::all();
        return view("admin.total_transaksi.create", compact('penjualan'));
    }

    //method untuk kirim data dari imputan form ke tabel kategori database
    public function store(Request $request)
    {
        //validasi imputan
        $this->validate($request, [
            'tanggal' => 'required',
            'penjualan_id' => 'required',
            'jumlah' => 'required',
            'ket' => 'required'

        ]);
        //data input disimpan kedalam tabel
        $total_transaksi = total_transaksi::create([
            'tanggal' => $request->tanggal,
            'penjualan_id' => $request->penjualan_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
        ]);

        //kondisi
        if ($total_transaksi) {
            //redirect dengan tampilkan pesan
            return redirect()->route('admin.total_transaksi.index')->with(['success' => 'Data anda berhasil disimpan di dalam tabel transaksi']);
        } else {

            return redirect()->route('admin.total_transaksi.index')->with(['error' => 'Data anda gagal disimpan tabel transaksi']);
        }
    }


    //method untuk tampilkan data yang mau diubah
    public function edit(total_transaksi $total_transaksi)
    {
        $penjualan = penjualan::all();
        return view("admin.total_transaksi.edit", compact('total_transaksi','penjualan'));
    }

    //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request, total_transaksi $total_transaksi)
    {
        //validasi imputan
        $request->validate([
           'tanggal' => 'required',
            'penjualan_id' => 'required',
            'jumlah' => 'required',
            'ket' => 'required'

        ]);

        //update data di tabel kategori dengan data baru

        $total_transaksi->update([
            'tanggal' => $request->tanggal,
            'penjualan_id' => $request->penjualan_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,

        ]);


        //kondisi jika berhasil atau tidak ubah datanya
        if ($total_transaksi) {
            //redirect dengan tampilkan pesan
            return redirect()->route('admin.total_transaksi.index')->with(['success' => 'Data anda berhasil disimpan di dalam tabel transaksi ']);
        } else {

            return redirect()->route('admin.total_transaksi.index')->with(['error' => 'Data anda gagal disimpan tabel transaksi']);
        }

    }

    // method untuk hapus data
    public function destroy($id)
    {
        $total_transaksi = total_transaksi::findorfail($id);
        $total_transaksi->delete();


        //kondisi berhasil atau tidak hapus datanya
        if ($total_transaksi) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['error' => 'error']);
        }

    }
}

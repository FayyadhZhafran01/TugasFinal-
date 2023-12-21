<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pembeli;
use Illuminate\Http\Request;

class Pembelicontroller extends Controller
{
    public function index(){
        $pembeli = pembeli::latest()->when (request()->q,function($pembeli){
            $pembeli = $pembeli -> where ("nama","like","%".request()->q."%");
        })->paginate(10);
        return view("admin.pembeli.index",compact("pembeli"));
    }
     // method untuk panggil form input data
     public function create(){
        return view("admin.pembeli.create");
    }

    //method untuk kirim data dari imputan form ke tabel kategori database
    public function store(Request $request){
        //validasi imputan
        $this->validate($request,[
            'nama'=> 'required',
            'alamat'=> 'required',
            'nomor_hp'=> 'required'
            
        ]);
    
    
        //data input disimpan kedalam tabel
        $pembeli = pembeli::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            

            ]);
    
            //kondisi
            if($pembeli){
                //redirect dengan tampilkan pesan
                return redirect()->route('admin.pembeli.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel pembeli']);
            }else{
                
                return redirect()->route('admin.pembeli.index')->with(['error' =>'Data anda gagal disimpan tabel pembeli']);
            }
    
        }

    //method untuk tampilkan data yang mau diubah
    public function edit(pembeli $pembeli){
        return view('admin.pembeli.edit',compact('pembeli'));
    }

    //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request,pembeli $pembeli){
        //validasi imputan
        $this->validate($request, [
            'nama'=> 'required',
            'alamat'=> 'required',
            'nomor_hp'=> 'required'
        ]);

    //update data di tabel kategori dengan data baru
    $pembeli = pembeli::findorfail($pembeli->id);
    $pembeli->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'nomor_hp' => $request->nomor_hp,
    ]);


    //kondisi jika berhasil atau tidak ubah datanya
    if($pembeli){
        //redirect dengan tampilkan pesan
    return redirect()->route('admin.pembeli.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel pembeli']);
}else{
    
    return redirect()->route('admin.pembeli.index')->with(['error' =>'Data anda gagal disimpan tabel pembeli']);
}

    }
     // method untuk hapus data
     public function destroy($id){
        $pembeli = pembeli::findorfail($id);
        $pembeli->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($pembeli){
            return response()->json(['status'=> 'success']);
        }else{
            return response()->json(['error'=> 'error']);
        }

    
}
}

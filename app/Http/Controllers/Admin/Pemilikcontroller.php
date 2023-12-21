<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pemilik;
use Illuminate\Http\Request;

class Pemilikcontroller extends Controller
{
    //untuk menampilkan data di view 
    public function index(){
        $pemilik = pemilik::latest()->when (request()->q,function($pemilik){
            $pemilik = $pemilik -> where ("nama","like","%".request()->q."%");
        })->paginate(10);
        return view("admin.pemilik.index",compact("pemilik"));
    }
     // method untuk panggil form input data
     public function create(){
        return view("admin.pemilik.create");
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
        $pemilik = pemilik::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            

            ]);
    
            //kondisi
            if($pemilik){
                //redirect dengan tampilkan pesan
                return redirect()->route('admin.pemilik.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel pemilik']);
            }else{
                
                return redirect()->route('admin.pemilik.index')->with(['error' =>'Data anda gagal disimpan tabel pemilik']);
            }
    
        }

    //method untuk tampilkan data yang mau diubah
    public function edit(pemilik $pemilik){
        return view('admin.pemilik.edit',compact('pemilik'));
    }

    //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request,pemilik $pemilik){
        //validasi imputan
        $this->validate($request, [
            'nama'=> 'required',
            'alamat'=> 'required',
            'nomor_hp'=> 'required'
        ]);

    //update data di tabel kategori dengan data baru
    $pemilik = pemilik::findorfail($pemilik->id);
    $pemilik->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'nomor_hp' => $request->nomor_hp,
    ]);


    //kondisi jika berhasil atau tidak ubah datanya
    if($pemilik){
        //redirect dengan tampilkan pesan
    return redirect()->route('admin.pemilik.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel pemilik']);
}else{
    
    return redirect()->route('admin.pemilik.index')->with(['error' =>'Data anda gagal disimpan tabel pemilik']);
}

    }
     // method untuk hapus data
     public function destroy($id){
        $pemilik = pemilik::findorfail($id);
        $pemilik->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($pemilik){
            return response()->json(['status'=> 'success']);
        }else{
            return response()->json(['error'=> 'error']);
        }

    
}
}

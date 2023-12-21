<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\tipe;
use Illuminate\Http\Request;

class Tipecontroller extends Controller
{
    //method untuk tampilkan data tipe
    public function index(){
        $tipe = tipe::latest()->when (request()->q,function($tipe){
            $tipe = $tipe -> where ("kode_mobil","like","%".request()->q."%");
        })->paginate(10);
        return view("admin.tipe.index",compact("tipe"));
    }
     // method untuk panggil form input data
     public function create(){
        return view("admin.tipe.create");
    }

    //method untuk kirim data dari imputan form ke tabel kategori database
    public function store(Request $request){
        //validasi imputan
        $this->validate($request,[
            'kode_mobil'=> 'required',
            'nama_mobil'=> 'required',
            'harga_jual'=> 'required',
            'harga_beli'=> 'required'
            
        ]);
    
    
        //data input disimpan kedalam tabel
        $tipe = tipe::create([
            'kode_mobil' => $request->kode_mobil,
            'nama_mobil' => $request->nama_mobil,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,

            ]);
    
            //kondisi
            if($tipe){
                //redirect dengan tampilkan pesan
                return redirect()->route('admin.tipe.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel tipe']);
            }else{
                
                return redirect()->route('admin.tipe.index')->with(['error' =>'Data anda gagal disimpan tabel tipe']);
            }
    
        }

    //method untuk tampilkan data yang mau diubah
    public function edit(tipe $tipe){
        return view('admin.tipe.edit',compact('tipe'));
    }

    //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request,tipe $tipe){
        //validasi imputan
        $this->validate($request, [
            'kode_mobil'=> 'required',
            'nama_mobil'=> 'required',
            'harga_jual'=> 'required',
            'harga_beli'=> 'required'
        ]);

    //update data di tabel kategori dengan data baru
    $tipe = tipe::findorfail($tipe->id);
    $tipe->update([
        'kode_mobil' => $request->kode_mobil,
        'nama_mobil' => $request->nama_mobil,
        'harga_jual' => $request->harga_jual,
        'harga_beli' => $request->harga_beli,
    ]);


    //kondisi jika berhasil atau tidak ubah datanya
    if($tipe){
        //redirect dengan tampilkan pesan
    return redirect()->route('admin.tipe.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel tipe']);
}else{
    
    return redirect()->route('admin.tipe.index')->with(['error' =>'Data anda gagal disimpan tabel tipe']);
}

    }
     // method untuk hapus data
     public function destroy($id){
        $tipe = tipe::findorfail($id);
        $tipe->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($tipe){
            return response()->json(['status'=> 'success']);
        }else{
            return response()->json(['error'=> 'error']);
        }

    
}


}
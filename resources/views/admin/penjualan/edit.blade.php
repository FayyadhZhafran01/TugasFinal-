@extends('layouts.app', ['title' => 'Edit penjualan - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md"> <h2 class="text-lg text-gray-700 font-semibold capitalize">EDIT PENJUALAN</h2> <hr class="mt-4">
       <form action="{{ route('admin.penjualan.update', $penjualan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT') 
            <div class="grid grid-cols-1 gap-6 mt-4"> 

                <div> 
                    <label class="text-gray-700" for="kode_penjualan">KODE PENJUALAN</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number" name="kode_penjualan" value="{{ old('kode_penjualan',$penjualan->kode_penjualan) }}" placeholder="masukkan kode penjualan">
                    @error('kode_penjualan')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>
               
            <div class="mb-4">
                    <label for="tipe_id" class="block text-gray-600 text-sm font-medium mb-2">MASUKKAN TIPE</label>
                    <select name="tipe_id" id="tipe_id" class="form-select w-full">
                        @foreach($tipe as $tp)
                            <option value="{{ $tp->id }}" {{ $penjualan->tipe_id == $tp->tipe_id ? 'selected' : '' }}>
                                {{ $tp->nama_mobil }}
                            </option>
                        @endforeach
                    </select>
                    @error('tipe_id')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
            </div>
                <div class="mb-4">
                    <label for="pemilik_id" class="block text-gray-600 text-sm font-medium mb-2">MASUKKAN PEMILIK</label>
                    <select name="pemilik_id" id="pemilik_id" class="form-select w-full">
                        @foreach($pemilik as $pm)
                            <option value="{{ $pm->id }}" {{ $penjualan->pemilik_id == $pm->pemilik_id ? 'selected' : '' }}>
                                {{ $pm->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('pemilik_id')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="pembeli_id" class="block text-gray-600 text-sm font-medium mb-2">MASUKKAN PEMBELI</label>
                    <select name="pembeli_id" id="pembeli_id" class="form-select w-full">
                        @foreach($pembeli as $pb)
                            <option value="{{ $pb->id }}" {{ $penjualan->pembeli_id == $pb->pembeli_id ? 'selected' : '' }}>
                                {{ $pb->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('pembeli_id')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>
             <div> 
                    <label class="text-gray-700" for="jumlah_jual">JUMLAH PENJUALAN</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number" name="jumlah_jual" value="{{ old('jumlah_jual',$penjualan->jumlah_jual) }}" placeholder="masukkan jumlah penjualan">
                    @error('jumlah_jual')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>
            <div> 
                    <label class="text-gray-700" for="keterangan">KET</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="keterangan" value="{{ old('keterangan',$penjualan->keterangan) }}" placeholder="masukkan keterangan">
                    @error('keterangan')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-start mt-4">
                <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">UPDATE</button>
            </div>
        </form>
    </div>
</div>
</main>
@endsection
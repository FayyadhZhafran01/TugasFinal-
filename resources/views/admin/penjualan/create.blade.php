@extends('layouts.app', ['title' => 'Tambah penjualan - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg
        text-gray-700 font-semibold capitalize">TAMBAH PENJUALAN</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.penjualan.store') }}" method="POST"> @csrf <div
                    class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700" for="kode_penjualan">KODE PENJUALAN</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number" name="kode_penjualan" value="{{ old('kode_penjualan')}}" placeholder="Masukkan kode penjualan">
                        @error('kode_penjualan')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{$message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="tipe_id">NAMA TIPE</label>
                        <select class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white"
                            name="tipe_id">
                            <option value="" disabled selected>Pilih Tipe</option>
                            @foreach($tipe as $tp)
                            <option value="{{ $tp->id }}">{{ $tp->nama_mobil}}</option>
                            @endforeach
                        </select>
                        @error('tipe_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                     <div>
                        <label class="text-gray-700" for="pemilik_id">NAMA PEMILIK</label>
                        <select class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white"
                            name="pemilik_id">
                            <option value="" disabled selected>Pilih Pemilik</option>
                            @foreach($pemilik as $pm)
                            <option value="{{ $pm->id }}">{{ $pm->nama}}</option>
                            @endforeach
                        </select>
                        @error('pemilik_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="pembeli_id">NAMA PEMBELI</label>
                        <select class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white"
                            name="pembeli_id">
                            <option value="" disabled selected>Pilih Pembeli</option>
                            @foreach($pembeli as $pb)
                            <option value="{{ $pb->id }}">{{ $pb->nama}}</option>
                            @endforeach
                        </select>
                        @error('pembeli_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                     @enderror
                    </div>
                        <div>
                        <label class="text-gray-700" for="jumlah_jual">JUMLAH PENJUALAN</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number" name="jumlah_jual" value="{{ old('jumlah_jual')}}" placeholder="Masukkan jumlah penjualan">
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
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="keterangan" value="{{ old('keterangan')}}" placeholder="Masukkan Keterangan">
                        @error('keterangan')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{$message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="flex justify-start mt-4">
                        <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray700">SIMPAN</button>
                    </div>
            </form>
        </div>
    </div>
</main>
@endsection
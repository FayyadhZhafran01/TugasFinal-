@extends('layouts.app', ['title' => 'Tambah transaksi - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg
        text-gray-700 font-semibold capitalize">TAMBAH TRANSAKSI</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.total_transaksi.store') }}" method="POST"> @csrf <div
                    class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700" for="tanggal">TANGGAL</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="datetime-local" name="tanggal" value="{{ old('tanggal')}}" placeholder="Masukkan Tanggal">
                        @error('tanggal')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{$message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="penjualan_id">KODE PENJUALAN</label>
                        <select class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white"
                            name="penjualan_id">
                            <option value="" disabled selected>Pilih Kode</option>
                            @foreach($penjualan as $pj)
                            <option value="{{ $pj->id }}">{{ $pj->kode_penjualan}}</option>
                            @endforeach
                        </select>
                        @error('penjualan_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="jumlah">JUMLAH</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number" name="jumlah" value="{{ old('jumlah')}}" placeholder="Masukkan jumlah penjualan">
                        @error('jumlah')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{$message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                     <div>
                        <label class="text-gray-700" for="ket">KET</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="ket" value="{{ old('ket')}}" placeholder="Masukkan Keterangan">
                        @error('ket')
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
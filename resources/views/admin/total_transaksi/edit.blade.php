@extends('layouts.app', ['title' => 'Edit transaksi - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md"> <h2 class="text-lg text-gray-700 font-semibold capitalize">EDIT TRANSAKSI</h2> <hr class="mt-4">
       <form action="{{ route('admin.total_transaksi.update', $total_transaksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT') 
            <div class="grid grid-cols-1 gap-6 mt-4"> 

                <div> 
                    <label class="text-gray-700" for="tanggal">TANGGAL</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="datetime-local" name="tanggal" value="{{ old('tanggal',$total_transaksi->tanggal) }}" placeholder="masukkan tanggal">
                    @error('tanggal')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>
               
            <div class="mb-4">
                    <label for="penjualan_id" class="block text-gray-600 text-sm font-medium mb-2">MASUKKAN KODE</label>
                    <select name="penjualan_id" id="penjualan_id" class="form-select w-full">
                        @foreach($penjualan as $pj)
                            <option value="{{ $pj->id }}" {{ $total_transaksi->penjualan_id == $pj->penjualan_id ? 'selected' : '' }}>
                                {{ $pj->kode_penjualan }}
                            </option>
                        @endforeach
                    </select>
                    @error('penjualan_id')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
            </div>
             <div> 
                    <label class="text-gray-700" for="jumlah">JUMLAH PENJUALAN</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number" name="jumlah" value="{{ old('jumlah',$total_transaksi->jumlah) }}" placeholder="masukkan jumlah penjualan">
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
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="ket" value="{{ old('ket',$total_transaksi->ket) }}" placeholder="masukkan keterangan">
                    @error('ket')
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
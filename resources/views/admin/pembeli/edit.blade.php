@extends('layouts.app', ['title' => 'EDIT PEMBELI - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8"> <div class="p-6 bg-white rounded-md shadow-md"> <h2 class="text-lg
        text-gray-700 font-semibold capitalize">EDIT PEMBELI</h2> <hr class="mt-4"> <form
        action="{{ route('admin.pembeli.update', $pembeli->id) }}" method="POST">
        @csrf @method('PUT') 
    <div> <label class="text-gray-700" for="nama">NAMA</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="text" name="nama" value="{{ old('nama',
            $pembeli->nama) }}" placeholder="masukkan nama">
            @error('nama')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
    <div> <label class="text-gray-700" for="alamat">ALAMAT</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="text" name="alamat" value="{{ old('alamat',
            $pembeli->alamat) }}" placeholder="Masukkan alamat pembeli">
            @error('alamat')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
    <div> <label class="text-gray-700" for="nomor_hp">NOMOR HP</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="number" name="nomor_hp" value="{{ old('nomor_hp',
            $pembeli->nomor_hp) }}" placeholder="harga jual">
            @error('nomor_hp')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
    
    <div class="flex justify-start mt-4">
        <button type="submit" class="px-4 py-2 bg-gray-600
text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray700">UPDATE</button>
    </div>
    </form>
    </div>
    </div>
</main>
@endsection
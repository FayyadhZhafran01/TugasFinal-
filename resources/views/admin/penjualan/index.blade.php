@extends('layouts.app', ['title' => 'penjualan - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="flex items-center"> <button class="text-white
        focus:outline-none bg-gray-600 px-4 py-2 shadow-sm rounded-md"> <a href="{{route('admin.penjualan.create')}}">
                    TAMBAH</a>
            </button>
            <div class="relative mx-4"> <span class="absolute inset-y-0 left-0 pl-3 flex itemscenter">
                    <svg class=" h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.86613.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" strokelinecap="round" stroke-linejoin=" round" />
                    </svg> </span>
                <form action="{{ route('admin.penjualan.index') }}" method="GET"> <input class="form-input w-full
        rounded-lg pl-10 pr-4" type="text" name="q" value="{{ request()->query('q') }}" placeholder="Search"> </form>
            </div>
        </div>
        <div class=" -mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead class=" justify-between">
                        <tr class="bg-gray-600 w-full">
                            <th class="px-16 py-2"> <span class="text-white">KODE PENJUALAN</span> </th>
                            <th class="px-16 py-2 text-left">
                                <span class="text-white">NAMA TIPE</span>
                            </th>
                            <th class="px-16 py-2 text-left">
                                <span class="text-white">NAMA PEMILIK</span>
                            </th>
                            <th class="px-16 py-2 text-left">
                                <span class="text-white">NAMA PEMBELI</span>
                            </th>
                            <th class="px-16 py-2 text-left">
                                <span class="text-white">JUMLAH PENJUALAN</span>
                            </th>
                              <th class="px-16 py-2 text-left">
                                <span class="text-white">KET</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-white">AKSI</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        @forelse($penjualan as $pj)
                        <tr class="border bg-white">
                            <td class="px-16 py-2">{{ $pj->kode_penjualan}}</td>
                            <td class="px-16 py-2">{{ $pj->tipe->nama_mobil}}</td>
                            <td class="px-16 py-2">{{ $pj->pemilik->nama}}</td>
                            <td class="px-16 py-2">{{ $pj->pembeli->nama}}</td>
                            <td class="px-16 py-2">{{ $pj->jumlah_jual}}</td>
                            <td class="px-16 py-2">{{ $pj->keterangan}}</td>

                            <td class="px-10 py-2 text-center">
                                <a href="{{route('admin.penjualan.edit', $pj->id) }}"
                                    class="bg-indigo-600 px-4 py-2 rounded shadow-sm text-xs text-white focus:outline-none">EDIT</a>
                                <button onClick="destroy(this.id)" id="{{ $pj->id }}"
                                    class="bg-red-600 px-4 py-2 rounded shadow-sm text-xs text-white focus:outline-none">HAPUS</button>
                            </td>
                        </tr>
                        @empty
                        <div class="bg-red-500 text-white text-center p-3 rounded-sm shadow-md">
                            Data Belum Tersedia!
                        </div>
                        @endforelse
                    </tbody>
                </table>
                @if ($penjualan->hasPages())
                <div class="bg-white p-3">
                    {{ $penjualan->links('vendor.pagination.tailwind') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</main>
<script>
    function destroy(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'APAKAH KAMU YAKIN ?',
            text: "INGIN MENGHAPUS DATA INI!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA, HAPUS!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                jQuery.ajax({
                    url: `/admin/penjualan/${id}`,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function (response) {
                        if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        })
    }
</script>
@endsection
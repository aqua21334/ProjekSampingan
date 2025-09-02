@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Literatur</h2>
            <a href="{{ route('literatur.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow">Tambah Literatur</a>
        </div>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-900 rounded shadow text-white">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2 font-semibold">No</th>
                        <th class="px-4 py-2 font-semibold">Judul</th>
                        <th class="px-4 py-2 font-semibold">Penulis</th>
                        <th class="px-4 py-2 font-semibold">Tahun</th>
                        <th class="px-4 py-2 font-semibold">Penerbit</th>
                        <th class="px-4 py-2 font-semibold">SNI Number</th>
                        <th class="px-4 py-2 font-semibold">Link</th>
                        <th class="px-4 py-2 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($literaturs as $literatur)
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                        <td class="px-4 py-2 text-white">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-white">{{ $literatur->judul }}</td>
                        <td class="px-4 py-2 text-white">{{ $literatur->penulis }}</td>
                        <td class="px-4 py-2 text-white">{{ $literatur->tahun }}</td>
                        <td class="px-4 py-2 text-white">{{ $literatur->penerbit }}</td>
                        <td class="px-4 py-2 text-white">{{ $literatur->sni_number }}</td>
                        <td class="px-4 py-2 text-white">
                            @if($literatur->link)
                                <a href="{{ $literatur->link }}" target="_blank" class="text-blue-400 hover:underline">Lihat Link</a>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('literatur.edit', $literatur->id_literatur) }}" class="text-blue-400 hover:underline">Edit</a>
                            <form action="{{ route('literatur.destroy', $literatur->id_literatur) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline ml-2" onclick="return confirm('Yakin hapus literatur?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-gray-400">Data literatur tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

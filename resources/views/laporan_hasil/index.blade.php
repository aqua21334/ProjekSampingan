@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Laporan Hasil</h2>
            <a href="{{ route('laporan_hasil.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow">Tambah Laporan</a>
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
                        <th class="px-4 py-2 font-semibold">ID Laporan</th>
                        <th class="px-4 py-2 font-semibold">Judul</th>
                        <th class="px-4 py-2 font-semibold">Isi Laporan</th>
                        <th class="px-4 py-2 font-semibold">Tanggal Laporan</th>
                        <th class="px-4 py-2 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporan_hasils as $laporan)
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                        <td class="px-4 py-2 text-white">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-white">{{ $laporan->id_laporan }}</td>
                        <td class="px-4 py-2 text-white">{{ $laporan->judul }}</td>
                        <td class="px-4 py-2 text-white">{{ $laporan->isi_laporan }}</td>
                        <td class="px-4 py-2 text-white">{{ $laporan->tanggal_laporan }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('laporan_hasil.edit', $laporan->id_laporan) }}" class="text-blue-400 hover:underline">Edit</a>
                            <form action="{{ route('laporan_hasil.destroy', $laporan->id_laporan) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline ml-2" onclick="return confirm('Yakin hapus laporan?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-400">Data laporan tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

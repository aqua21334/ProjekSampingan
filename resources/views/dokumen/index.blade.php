@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Dokumen</h2>
            <a href="{{ route('dokumen.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow">Tambah Dokumen</a>
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
                        <th class="px-4 py-2 font-semibold">ID Dokumen</th>
                        <th class="px-4 py-2 font-semibold">Jenis Dokumen</th>
                        <th class="px-4 py-2 font-semibold">Judul</th>
                        <th class="px-4 py-2 font-semibold">File</th>
                        <th class="px-4 py-2 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokumens as $dokumen)
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                            <td class="px-4 py-2 text-white">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-white">{{ $dokumen->id_dokumen }}</td>
                        <td class="px-4 py-2 text-white">{{ $dokumen->jenis_dokumen }}</td>
                        <td class="px-4 py-2 text-white">{{ $dokumen->judul }}</td>
                        <td class="px-4 py-2 text-white">
                            @if($dokumen->file_url)
                                <a href="{{ asset('storage/' . $dokumen->file_url) }}" target="_blank" class="text-blue-400 hover:underline">Lihat PDF</a>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('dokumen.edit', $dokumen->id_dokumen) }}" class="text-blue-400 hover:underline">Edit</a>
                            <form action="{{ route('dokumen.destroy', $dokumen->id_dokumen) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline ml-2" onclick="return confirm('Yakin hapus dokumen?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-400">Data dokumen tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Permintaan</h2>
            <a href="{{ route('permintaan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow">Tambah Permintaan</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-900 rounded shadow text-white">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2 font-semibold">No</th>
                        <th class="px-4 py-2 font-semibold">ID Permintaan</th>
                        <th class="px-4 py-2 font-semibold">Pemohon</th>
                        <th class="px-4 py-2 font-semibold">Jenis Permintaan</th>
                        <th class="px-4 py-2 font-semibold">Status</th>
                        <th class="px-4 py-2 font-semibold">Keterangan</th>
                        <th class="px-4 py-2 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permintaans as $permintaan)
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                        <td class="px-4 py-2 text-white">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-white">{{ $permintaan->id_permintaan }}</td>
                        <td class="px-4 py-2 text-white">{{ $permintaan->pemohon }}</td>
                        <td class="px-4 py-2 text-white">{{ $permintaan->jenis_permintaan }}</td>
                        <td class="px-4 py-2 text-white">{{ $permintaan->status }}</td>
                        <td class="px-4 py-2 text-white">{{ $permintaan->keterangan ?? '-' }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('permintaan.edit', $permintaan->id_permintaan) }}" class="text-blue-400 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-400">Data permintaan tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

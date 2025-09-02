@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">SOP</h2>
            <a href="{{ route('sop.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow flex items-center gap-2">
                <span class="material-icons text-base">Add SOP
            </a>
        </div>
        <form method="GET" action="{{ route('sop.index') }}" class="flex flex-wrap gap-4 items-center bg-gray-800 p-4 rounded mb-4">
            <input type="text" name="kode_sop" placeholder="Kode SOP" class="border border-gray-700 bg-gray-900 text-gray-600 rounded px-3 py-2" value="{{ request('kode_sop') }}">
            <input type="text" name="nama_sop" placeholder="Nama SOP" class="border border-gray-700 bg-gray-900 text-gray-600 rounded px-3 py-2" value="{{ request('nama_sop') }}">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold">Search</button>
        </form>
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-600 text-white rounded shadow font-semibold text-lg">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-900 rounded shadow text-white">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2 font-semibold">No</th>
                        <th class="px-4 py-2 font-semibold">Kode SOP</th>
                        <th class="px-4 py-2 font-semibold">Nama SOP</th>
                        <th class="px-4 py-2 font-semibold">Deskripsi SOP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sops as $i => $sop)
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                        <td class="px-4 py-2 text-white">{{ $i+1 }}</td>
                        <td class="px-4 py-2 text-white">{{ $sop->kode_sop }}</td>
                        <td class="px-4 py-2 text-white">{{ $sop->nama_sop }}</td>
                        <td class="px-4 py-2 text-white">
                            @if($sop->deskripsi_sop)
                                <a href="{{ asset('storage/' . $sop->deskripsi_sop) }}" target="_blank" class="text-blue-400 hover:underline">Lihat File</a>
                            @else
                                <span class="text-gray-400 italic">Tidak ada file</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('sop.edit', $sop->kode_sop) }}" class="text-blue-400 hover:underline mr-2">Edit</a>
                            <form action="{{ route('sop.destroy', $sop->kode_sop) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"><span class="material-icons text-base align-middle">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-400">Data SOP tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

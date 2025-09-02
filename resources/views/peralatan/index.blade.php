@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Peralatan</h2>
            <a href="{{ route('peralatan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow flex items-center gap-2">
                <span class="material-icons text-base">Add Peralatan
            </a>
        </div>
        <form method="GET" action="{{ route('peralatan.index') }}" class="flex flex-wrap gap-4 items-center bg-gray-800 p-4 rounded mb-4">
            <input type="text" name="kode_bmn" placeholder="Kode BMN" class="border border-gray-700 bg-gray-900 text-gray-900 rounded px-3 py-2" value="{{ request('kode_bmn') }}">
            <input type="text" name="nama_peralatan" placeholder="Nama Peralatan" class="border border-gray-700 bg-gray-900 text-white rounded px-3 py-2" value="{{ request('nama_peralatan') }}">
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
                        <th class="px-4 py-2 font-semibold">Kode BMN</th>
                        <th class="px-4 py-2 font-semibold">Nama Peralatan</th>
                        <th class="px-4 py-2 font-semibold">Tanggal Kalibrasi</th>
                        <th class="px-4 py-2 font-semibold">Status Kalibrasi</th>
                        <th class="px-4 py-2 font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peralatans as $i => $peralatan)
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                        <td class="px-4 py-2 text-white">{{ $i+1 }}</td>
                        <td class="px-4 py-2 text-white">{{ $peralatan->kode_bmn }}</td>
                        <td class="px-4 py-2 text-white">{{ $peralatan->nama_peralatan }}</td>
                        <td class="px-4 py-2 text-white">{{ $peralatan->tanggal_kalibrasi ?? '-' }}</td>
                        <td class="px-4 py-2 text-white">{{ $peralatan->status_kalibrasi ?? '-' }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('peralatan.edit', $peralatan->kode_bmn) }}" class="text-blue-400 hover:underline mr-2">Edit</a>
                            <form action="{{ route('peralatan.destroy', $peralatan->kode_bmn) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"><span class="material-icons text-base align-middle">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-400">Data peralatan tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

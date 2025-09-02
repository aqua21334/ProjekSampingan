@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold mb-6 text-gray-900">Tambah Peralatan</h2>
        <form method="POST" action="{{ route('peralatan.store') }}">
            @csrf
            <div class="mb-4">
                <label for="kode_bmn" class="block text-gray-700 font-semibold mb-2">Kode BMN</label>
                <input type="text" name="kode_bmn" id="kode_bmn" class="border rounded px-3 py-2 w-full" value="{{ old('kode_bmn') }}" required>
                @error('kode_bmn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="nama_peralatan" class="block text-gray-700 font-semibold mb-2">Nama Peralatan</label>
                <input type="text" name="nama_peralatan" id="nama_peralatan" class="border rounded px-3 py-2 w-full" value="{{ old('nama_peralatan') }}" required>
                @error('nama_peralatan')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="tanggal_kalibrasi" class="block text-gray-700 font-semibold mb-2">Tanggal Kalibrasi</label>
                <input type="date" name="tanggal_kalibrasi" id="tanggal_kalibrasi" class="border rounded px-3 py-2 w-full" value="{{ old('tanggal_kalibrasi') }}">
                @error('tanggal_kalibrasi')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status_kalibrasi" class="block text-gray-700 font-semibold mb-2">Status Kalibrasi</label>
                <select name="status_kalibrasi" id="status_kalibrasi" class="border rounded px-3 py-2 w-full" required>
                    <option value="Belum" {{ old('status_kalibrasi', 'Belum') == 'Belum' ? 'selected' : '' }}>Belum</option>
                    <option value="Sudah" {{ old('status_kalibrasi') == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                </select>
                @error('status_kalibrasi')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('peralatan.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-gray-600 px-4 py-2 rounded font-bold shadow">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

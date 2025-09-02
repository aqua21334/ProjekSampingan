@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold mb-6 text-gray-900">Tambah SOP</h2>
    <form method="POST" action="{{ route('sop.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="kode_sop" class="block text-gray-700 font-semibold mb-2">Kode SOP</label>
                <input type="text" name="kode_sop" id="kode_sop" class="border rounded px-3 py-2 w-full" value="{{ old('kode_sop') }}" required>
                @error('kode_sop')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="nama_sop" class="block text-gray-700 font-semibold mb-2">Nama SOP</label>
                <input type="text" name="nama_sop" id="nama_sop" class="border rounded px-3 py-2 w-full" value="{{ old('nama_sop') }}" required>
                @error('nama_sop')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="deskripsi_sop" class="block text-gray-700 font-semibold mb-2">File Deskripsi SOP</label>
                <input type="file" name="deskripsi_sop" id="deskripsi_sop" class="border rounded px-3 py-2 w-full" accept=".pdf,.doc,.docx,.txt" required>
                @error('deskripsi_sop')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('sop.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-gray-600 px-4 py-2 rounded font-bold shadow">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

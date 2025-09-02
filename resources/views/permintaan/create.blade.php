@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold mb-6 text-gray-900">Tambah Permintaan</h2>
        <form method="POST" action="{{ route('permintaan.store') }}">
            @csrf
            <div class="mb-4">
                <label for="id_permintaan" class="block text-gray-700 font-semibold mb-2">ID Permintaan</label>
                <input type="text" name="id_permintaan" id="id_permintaan" class="border rounded px-3 py-2 w-full" value="{{ old('id_permintaan') }}" required maxlength="20">
                @error('id_permintaan')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pemohon" class="block text-gray-700 font-semibold mb-2">Pemohon</label>
                <input type="text" name="pemohon" id="pemohon" class="border rounded px-3 py-2 w-full" value="{{ old('pemohon') }}" required maxlength="100">
                @error('pemohon')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="jenis_permintaan" class="block text-gray-700 font-semibold mb-2">Jenis Permintaan</label>
                <input type="text" name="jenis_permintaan" id="jenis_permintaan" class="border rounded px-3 py-2 w-full" value="{{ old('jenis_permintaan') }}" required>
                @error('jenis_permintaan')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" id="status" class="border rounded px-3 py-2 w-full" required>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700 font-semibold mb-2">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="border rounded px-3 py-2 w-full" rows="3">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('permintaan.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-gray-600 px-4 py-2 rounded font-bold shadow">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

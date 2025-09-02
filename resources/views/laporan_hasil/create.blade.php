@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <h2 class="text-xl font-bold text-white mb-6">Tambah Laporan Hasil</h2>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('laporan_hasil.store') }}" method="POST" class="space-y-4">
            @csrf
                <div>
                    <label class="block text-white font-semibold mb-2">ID Laporan</label>
                    <input type="text" name="id_laporan" value="{{ old('id_laporan') }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" required maxlength="20">
                </div>
            <div>
                <label class="block text-white font-semibold mb-2">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" required maxlength="150">
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">Isi Laporan</label>
                <textarea name="isi_laporan" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" required>{{ old('isi_laporan') }}</textarea>
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">Tanggal Laporan</label>
                <input type="date" name="tanggal_laporan" value="{{ old('tanggal_laporan') }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" required>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('laporan_hasil.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

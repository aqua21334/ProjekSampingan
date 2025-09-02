@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <h2 class="text-xl font-bold text-white mb-6">Edit Dokumen</h2>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('dokumen.update', $dokumen->id_dokumen) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-white font-semibold mb-2">ID Dokumen</label>
                <input type="text" name="id_dokumen" value="{{ old('id_dokumen', $dokumen->id_dokumen) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" required maxlength="20">
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">Jenis Dokumen</label>
                <select name="jenis_dokumen" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" required>
                    <option value="Panduan Mutu" {{ $dokumen->jenis_dokumen == 'Panduan Mutu' ? 'selected' : '' }}>Panduan Mutu</option>
                    <option value="Prosedur" {{ $dokumen->jenis_dokumen == 'Prosedur' ? 'selected' : '' }}>Prosedur</option>
                    <option value="Instruksi Kerja" {{ $dokumen->jenis_dokumen == 'Instruksi Kerja' ? 'selected' : '' }}>Instruksi Kerja</option>
                    <option value="Formulir" {{ $dokumen->jenis_dokumen == 'Formulir' ? 'selected' : '' }}>Formulir</option>
                </select>
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $dokumen->judul) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" required maxlength="150">
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">File PDF (kosongkan jika tidak ganti)</label>
                <input type="file" name="file" accept="application/pdf" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700">
                @if($dokumen->file_url)
                    <p class="mt-2 text-gray-300">File saat ini: <a href="{{ asset('storage/' . $dokumen->file_url) }}" target="_blank" class="text-blue-400 hover:underline">Lihat PDF</a></p>
                @endif
            </div>
            <div class="flex justify-end">
                <a href="{{ route('dokumen.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

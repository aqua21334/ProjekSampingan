@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-gray-900 rounded shadow p-4 mb-6">
        <h2 class="text-xl font-bold text-white mb-6">Edit Literatur</h2>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('literatur.update', $literatur->id_literatur) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-white font-semibold mb-2">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $literatur->judul) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" required maxlength="200">
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">Penulis</label>
                <input type="text" name="penulis" value="{{ old('penulis', $literatur->penulis) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" maxlength="150">
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">Tahun</label>
                <input type="text" name="tahun" value="{{ old('tahun', $literatur->tahun) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" maxlength="4">
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">Penerbit</label>
                <input type="text" name="penerbit" value="{{ old('penerbit', $literatur->penerbit) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" maxlength="150">
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">SNI Number</label>
                <input type="text" name="sni_number" value="{{ old('sni_number', $literatur->sni_number) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" maxlength="100">
            </div>
            <div>
                <label class="block text-white font-semibold mb-2">Link</label>
                <input type="text" name="link" value="{{ old('link', $literatur->link) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700" maxlength="255">
            </div>
            <div class="flex justify-end">
                <a href="{{ route('literatur.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold shadow">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

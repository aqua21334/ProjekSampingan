@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-gray-100">Edit Personil</h2>
        <form action="{{ route('personil.update', $personil->nip) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="nip" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">NIP</label>
                <input type="text" name="nip" id="nip" value="{{ old('nip', $personil->nip) }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100 @error('nip') border-red-500 @enderror" required pattern="^[A-Za-z0-9]+$" title="NIP harus unik dan hanya huruf/angka">
                @error('nip')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="nama_personil" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Nama Personil</label>
                <input type="text" name="nama_personil" id="nama_personil" value="{{ $personil->nama_personil }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" required>
            </div>
            <div>
                <label for="jabatan" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" value="{{ $personil->jabatan }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100">
            </div>
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ $personil->email }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100">
            </div>
            <div>
                <label for="no_hp" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Phone</label>
                <input type="text" name="no_hp" id="no_hp" value="{{ $personil->no_hp }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150">Update</button>
                <a href="{{ route('personil.index') }}" class="w-full bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition duration-150 text-center">Batalkan</a>
            </div>
        </form>
    </div>
</div>
@endsection

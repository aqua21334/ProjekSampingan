@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-gray-100">Tambah Personil</h2>
        <form action="{{ route('personil.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nip" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">NIP</label>
                <input type="text" name="nip" id="nip" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" required>
            </div>
            <div>
                <label for="nama_personil" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Nama Personil</label>
                <input type="text" name="nama_personil" id="nama_personil" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" required>
            </div>
            <div>
                <label for="jabatan" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100">
            </div>
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100">
            </div>
            <div>
                <label for="no_hp" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Phone</label>
                <input type="text" name="no_hp" id="no_hp" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150">Simpan</button>
                <a href="{{ route('personil.index') }}" class="w-full bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition duration-150 text-center">Batalkan</a>
            </div>
        </form>
    </div>
</div>
@endsection

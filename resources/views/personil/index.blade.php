@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-600 text-white rounded shadow font-semibold text-lg">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold flex items-center gap-2 text-white dark:text-white">
            <span class="material-icons"></span>Personil
        </h2>
        <a href="{{ route('personil.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center gap-2">
            <span class="material-icons">Tambah Personil
        </a>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded shadow p-4 mb-6">
        <form method="GET" action="{{ route('personil.index') }}" class="flex flex-wrap gap-4 items-center">
            <input type="text" name="nip" placeholder="NIP" class="border rounded px-3 py-2" value="{{ request('nip') }}">
            <input type="text" name="nama_personil" placeholder="Nama Personil" class="border rounded px-3 py-2" value="{{ request('nama_personil') }}">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Search</button>
        </form> 
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-900 rounded shadow text-white">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">NIP</th>
                    <th class="px-4 py-2">Nama Personil</th>
                    <th class="px-4 py-2">Jabatan</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($personils as $i => $personil)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $i+1 }}</td>
                    <td class="px-4 py-2">{{ $personil->nip }}</td>
                    <td class="px-4 py-2">{{ $personil->nama_personil }}</td>
                    <td class="px-4 py-2">{{ $personil->jabatan ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $personil->email ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $personil->no_hp ?? '-' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('personil.edit', $personil->nip) }}" class="text-blue-600 hover:underline mr-2"><span class="material-icons text-base align-middle">Edit</a>
                        <form action="{{ route('personil.destroy', $personil->nip) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"><span class="material-icons text-base align-middle">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Data personil tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

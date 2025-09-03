@extends('layouts.app')

@section('content')
<div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="mx-auto w-20 h-20 rounded-lg object-cover" />
            </a>
        </div>
        <ul class="menu">
            <li><a href="{{ route('personil.index') }}">Personil</a></li>
            <li><a href="{{ route('peralatan.index') }}">Peralatan</a></li>
            <li><a href="{{ route('sop.index') }}">Daftar SOP</a></li>
            <li><a href="{{ route('dokumen.index') }}">Dokumen</a></li>
            <li><a href="{{ route('permintaan.index') }}">Permintaan Layanan</a></li>
            <li><a href="{{ route('laporan.index') }}">Laporan Hasil</a></li>
            <li><a href="{{ route('literatur.index') }}">Literatur</a></li>
        </ul>
        <div style="flex:1"></div>
        <form method="POST" action="{{ route('logout') }}" style="width:100%;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
    <!-- Cards section removed as requested -->

        <div class="content">
            <!-- Data Personil Section -->
            <div class="permintaan-section" style="max-width:900px; margin:auto;">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-extrabold text-4xl text-gray-900">Daftar Personil</h2>
                    <a href="{{ route('personil.create') }}" class="bg-blue-600 text-gray-900 px-4 py-2 rounded shadow hover:bg-blue-700">Tambah Personil</a>
                </div>
                <!-- Search Form -->
                <form method="GET" action="" class="flex gap-4 mb-6">
                    <input type="text" name="nip" value="{{ request('nip') }}" placeholder="Cari NIP" class="border rounded px-3 py-2 w-1/3" />
                    <input type="text" name="nama_personil" value="{{ request('nama_personil') }}" placeholder="Cari Nama Personil" class="border rounded px-3 py-2 w-1/3" />
                    <button type="submit" class="bg-blue-600 text-black-900 px-4 py-2 rounded flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                        Cari
                    </button>
                </form>
                <!-- Table -->
                <div style="overflow-y:auto;">
                <table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background:#f0f0f0;">
                            <th style="padding:10px; border:1px solid #ddd;">No</th>
                            <th style="padding:10px; border:1px solid #ddd;">NIP</th>
                            <th style="padding:10px; border:1px solid #ddd;">Nama</th>
                            <th style="padding:10px; border:1px solid #ddd;">Email</th>
                            <th style="padding:10px; border:1px solid #ddd;">Jabatan</th>
                            <th style="padding:10px; border:1px solid #ddd;">No HP</th>
                            <th style="padding:10px; border:1px solid #ddd;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($personils as $i => $personil)
                        <tr>
                            <td style="padding:10px; border:1px solid #ddd;">{{ $i+1 }}</td>
                            <td style="padding:10px; border:1px solid #ddd;">{{ $personil->nip }}</td>
                            <td style="padding:10px; border:1px solid #ddd;">{{ $personil->nama_personil }}</td>
                            <td style="padding:10px; border:1px solid #ddd;">{{ $personil->email }}</td>
                            <td style="padding:10px; border:1px solid #ddd;">{{ $personil->jabatan }}</td>
                            <td style="padding:10px; border:1px solid #ddd;">{{ $personil->no_hp }}</td>
                            <td style="padding:10px; border:1px solid #ddd;">
                                <a href="{{ route('personil.edit', $personil->nip) }}" style="color:#007bff;">Edit</a> |
                                <form action="{{ route('personil.destroy', $personil->nip) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="color:red; border:none; background:none; cursor:pointer;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="padding:10px; text-align:center;">Tidak ada data personil.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>

            <!-- Statistik Personil section removed -->
        </div>
    </main>
</div>

<!-- Statistik dan chart personil dihapus sesuai permintaan -->

<style>
/* Gunakan styling sama persis dari dashboard */
    .dashboard { display: flex; height: 100vh; }
    .sidebar { width: 250px; background: #060E7E; color: #fff; padding: 20px; display: flex; flex-direction: column; align-items: center; }
    .sidebar .logo img { width: 80px; border-radius: 10px; border: 3px solid #7C62FF; margin-bottom: 40px; }
    .sidebar .menu { list-style: none; padding: 0; width: 100%; }
    .sidebar .menu li { padding: 15px; margin: 10px 0; text-align: center; background: rgba(255,255,255,0.1); border-radius: 10px; cursor: pointer; }
    .sidebar .logout-btn { margin-top: auto; padding: 12px; width: 100%; background: rgba(255, 80, 80, 0.8); border: none; color: white; border-radius: 10px; cursor: pointer; }
    .main-content { flex: 1; padding: 20px; background: #f9f9f9; }
</style>
@endsection

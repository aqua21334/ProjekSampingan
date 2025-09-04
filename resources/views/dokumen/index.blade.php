@extends('layouts.app')

@section('content')
<div class="dashboard">
<!-- Sidebar -->
<aside class="sidebar">
    <div class="logo" style="margin-bottom:50px;"> <!-- Tambahkan margin-bottom -->
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/Logo.jpg') }}" alt="Logo" class="w-20 h-20 rounded-lg" />
        </a>
    </div>

    <!-- Menu -->
    <ul class="menu">
        <li class="{{ Route::currentRouteName() == 'personil.index' ? 'active' : '' }}">
            <a href="{{ route('personil.index') }}"><i data-lucide="users"></i> Personil</a>
        </li>
        <li class="{{ Route::currentRouteName() == 'peralatan.index' ? 'active' : '' }}">
            <a href="{{ route('peralatan.index') }}"><i data-lucide="package"></i> Peralatan</a>
        </li>
        <li class="{{ Route::currentRouteName() == 'sop.index' ? 'active' : '' }}">
            <a href="{{ route('sop.index') }}"><i data-lucide="clipboard-list"></i> Daftar SOP</a>
        </li>
        <li class="{{ Route::currentRouteName() == 'dokumen.index' ? 'active' : '' }}">
            <a href="{{ route('dokumen.index') }}"><i data-lucide="file-text"></i> Dokumen</a>
        </li>
        <li class="{{ Route::currentRouteName() == 'permintaan.index' ? 'active' : '' }}">
            <a href="{{ route('permintaan.index') }}"><i data-lucide="inbox"></i> Permintaan Layanan</a>
        </li>
        <li class="{{ Route::currentRouteName() == 'laporan.index' ? 'active' : '' }}">
            <a href="{{ route('laporan.index') }}"><i data-lucide="bar-chart-2"></i> Laporan Hasil</a>
        </li>
        <li class="{{ Route::currentRouteName() == 'literatur.index' ? 'active' : '' }}">
            <a href="{{ route('literatur.index') }}"><i data-lucide="book-open"></i> Literatur</a>
        </li>
    </ul>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" class="logout-form" style="margin-top:auto;width:100%;">
        @csrf
        <button type="submit" class="btn-logout-red">
            <i data-lucide="log-out"></i> Logout
        </button>
    </form>
</aside>


    <!-- Main Content -->
    <main class="main-content">
        <div class="content">
            <div class="dokumen-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="title">Daftar Dokumen</h2>
                    <a href="{{ route('dokumen.create') }}" class="btn-add">
                        <i data-lucide="plus-circle"></i> Tambah Dokumen
                    </a>
                </div>

                <!-- Search Form -->
                <form method="GET" action="" class="search-form">
                    <input type="text" name="id_dokumen" value="{{ request('id_dokumen') }}" placeholder="Cari ID Dokumen" />
                    <input type="text" name="jenis_dokumen" value="{{ request('jenis_dokumen') }}" placeholder="Cari Jenis Dokumen" />
                    <button type="submit"><i data-lucide="search"></i> Cari</button>
                </form>

                <!-- Table -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Dokumen</th>
                                <th>Jenis Dokumen</th>
                                <th>Judul</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dokumens as $i => $dokumen)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $dokumen->id_dokumen }}</td>
                                <td>{{ $dokumen->jenis_dokumen }}</td>
                                <td>{{ $dokumen->judul }}</td>
                                <td>
                                    @if($dokumen->file_url)
                                        <a href="{{ asset('storage/' . $dokumen->file_url) }}" target="_blank" class="file-link">Lihat File</a>
                                    @else
                                        <span class="no-file">Tidak ada file</span>
                                    @endif
                                </td>
                                <td class="actions">
                                    <a href="{{ route('dokumen.edit', $dokumen->id_dokumen) }}" class="edit"><i data-lucide="edit"></i> Edit</a>
                                    <form action="{{ route('dokumen.destroy', $dokumen->id_dokumen) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="delete" onclick="return confirm('Yakin hapus dokumen?')">
                                            <i data-lucide="trash-2"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data dokumen tidak ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<style>
/* General */
.dashboard { display:flex; height:100vh; font-family: 'Inter', sans-serif; }
.sidebar { width:250px; background:#060E7E; color:#fff; padding:20px; display:flex; flex-direction:column; align-items:center; }
.logo-img { width:80px; border-radius:10px; border:3px solid #7C62FF; margin-bottom:40px; transition:.3s; }
.logo-img:hover { transform: scale(1.05); }

/* Menu */
.sidebar .menu { list-style:none; padding:0; width:100%; }
.sidebar .menu li { padding:12px; margin:8px 0; border-radius:10px; background:rgba(255,255,255,0.1); transition:.3s; }
.sidebar .menu li.active { background:#fff; color:#060E7E; font-weight:bold; border:2px solid #7C62FF; }
.sidebar .menu li a { display:flex; align-items:center; gap:10px; color:inherit; text-decoration:none; font-weight:500; }
.sidebar .menu li:hover { background:rgba(255,255,255,0.2); transform: translateX(5px); }

/* Logout */
.btn-logout-red { background:#E94A4A; color:white; padding:10px 20px; border-radius:10px; font-weight:500; display:flex; align-items:center; justify-content:center; gap:8px; transition: all 0.3s ease; border:none; cursor:pointer; width:100%; }
.sidebar .logout-form { margin-top:auto; width:100%; }
.btn-logout-red:hover { background:#cc0000; transform:scale(1.05); }

/* Main Content */
.main-content { flex:1; padding:20px; background:#f9f9f9; overflow-y:auto; }
.dokumen-section { background:white; padding:20px; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.1); max-width:1000px; margin:auto; }

/* Title & Button */
.title { font-size:2.5rem; font-weight:800; color:#111827; }
.btn-add { background:#2563eb; color:white; padding:10px 20px; border-radius:10px; display:flex; align-items:center; gap:8px; font-weight:500; transition:.3s; }
.btn-add:hover { background:#1e40af; transform:scale(1.05); }

/* Search */
.search-form { display:flex; gap:12px; margin-bottom:20px; flex-wrap:wrap; }
.search-form input { padding:10px; border:1px solid #d1d5db; border-radius:8px; width:200px; transition:.3s; }
.search-form input:focus { outline:none; border-color:#2563eb; box-shadow:0 0 0 2px rgba(37,99,235,0.3); }
.search-form button { background:#2563eb; color:white; padding:10px 16px; border-radius:8px; display:flex; align-items:center; gap:6px; transition:.3s; }
.search-form button:hover { background:#1e40af; transform:scale(1.05); }

/* Table */
.table-wrapper { overflow-x:auto; border-radius:10px; }
table { width:100%; border-collapse:collapse; min-width:700px; }
th, td { padding:12px 16px; border-bottom:1px solid #e5e7eb; text-align:left; }
th { background:linear-gradient(to right, #2563eb, #4f46e5); color:white; font-weight:600; }
tr:hover { background:#f3f4f6; }
.actions { display:flex; gap:8px; }
.actions a.edit { color:#2563eb; font-weight:500; display:flex; align-items:center; gap:4px; }
.actions a.edit:hover { color:#1e40af; }
.actions button.delete { color:#e94a4a; font-weight:500; display:flex; align-items:center; gap:4px; border:none; background:none; cursor:pointer; }
.actions button.delete:hover { color:#cc0000; }
.file-link { color:#2563eb; text-decoration:none; }
.file-link:hover { text-decoration:underline; }
.no-file { color:#888; font-style:italic; }

/* Responsive */
@media(max-width:768px){
    .search-form { flex-direction:column; }
    .search-form input, .search-form button { width:100%; }
    .title { font-size:2rem; }
}
</style>
@endsection

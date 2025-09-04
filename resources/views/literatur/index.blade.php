@extends('layouts.app')

@section('content')
<div class="dashboard">
<!-- Sidebar -->
<aside class="sidebar">
    <div class="logo mb-10"> <!-- tambahkan mb-10 untuk memberi jarak -->
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/Logo.jpg') }}" alt="Logo" class="w-20 h-20 rounded-lg" />
        </a>
    </div>

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

    <div style="flex:1"></div>
    <form method="POST" action="{{ route('logout') }}" style="width:100%;">
        @csrf
        <button type="submit" class="btn-logout-red"><i data-lucide="log-out"></i> Logout</button>
    </form>
</aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="content">
            <div class="card-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="title">Daftar Literatur</h2>
                    <a href="{{ route('literatur.create') }}" class="btn-add">
                        <i data-lucide="plus-circle"></i> Tambah Literatur
                    </a>
                </div>

                <!-- Search -->
                <form method="GET" class="search-form">
                    <input type="text" name="judul" placeholder="Cari Judul" value="{{ request('judul') }}" />
                    <input type="text" name="penulis" placeholder="Cari Penulis" value="{{ request('penulis') }}" />
                    <button type="submit"><i data-lucide="search"></i> Cari</button>
                </form>

                <!-- Success -->
                @if(session('success'))
                    <div class="success-msg">{{ session('success') }}</div>
                @endif

                <!-- Table -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tahun</th>
                                <th>Penerbit</th>
                                <th>SNI Number</th>
                                <th>Link</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($literaturs as $i => $literatur)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $literatur->judul }}</td>
                                <td>{{ $literatur->penulis }}</td>
                                <td>{{ $literatur->tahun }}</td>
                                <td>{{ $literatur->penerbit }}</td>
                                <td>{{ $literatur->sni_number }}</td>
                                <td>
                                    @if($literatur->link)
                                        <a href="{{ $literatur->link }}" target="_blank" class="link-btn">Lihat</a>
                                    @endif
                                </td>
                                <td class="actions">
                                    <a href="{{ route('literatur.edit', $literatur->id_literatur) }}" class="edit">
                                        <i data-lucide="edit"></i> Edit
                                    </a>
                                    <form action="{{ route('literatur.destroy', $literatur->id_literatur) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="delete" onclick="return confirm('Yakin hapus literatur?')">
                                            <i data-lucide="trash-2"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="8" class="text-center">Tidak ada data literatur.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<style>
/* General */
.dashboard { display:flex; height:100vh; font-family:'Inter',sans-serif; }
.sidebar { width:250px; background:#060E7E; color:#fff; padding:20px; display:flex; flex-direction:column; align-items:center; }
.logo-img { width:80px; border-radius:10px; border:3px solid #7C62FF; margin-bottom:40px; }
.sidebar .menu { list-style:none; padding:0; width:100%; }
.sidebar .menu li { padding:12px; margin:8px 0; border-radius:10px; background:rgba(255,255,255,0.1); display:flex; align-items:center; gap:10px; transition:.3s; }
.sidebar .menu li.active { background:#fff; color:#060E7E; font-weight:bold; border:2px solid #7C62FF; }
.sidebar .menu li a { display:flex; align-items:center; gap:10px; text-decoration:none; color:inherit; font-weight:500; width:100%; }
.sidebar .menu li:hover { background:rgba(255,255,255,0.2); transform:translateX(5px); }
.btn-logout-red { margin-top:auto; width:100%; padding:10px 0; background:#E94A4A; border:none; border-radius:10px; color:white; display:flex; justify-content:center; gap:6px; transition:.3s; cursor:pointer; }
.btn-logout-red:hover { background:#cc0000; transform:scale(1.05); }

.main-content { flex:1; padding:20px; background:#f9f9f9; overflow-y:auto; }
.card-section { background:white; padding:20px; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.1); max-width:1000px; margin:auto; }
.title { font-size:2.5rem; font-weight:800; color:#111827; }
.btn-add { background:#2563eb; color:white; padding:10px 20px; border-radius:10px; display:flex; align-items:center; gap:6px; font-weight:500; transition:.3s; }
.btn-add:hover { background:#1e40af; transform:scale(1.05); }

.search-form { display:flex; gap:12px; flex-wrap:wrap; margin-bottom:20px; }
.search-form input { padding:10px; border:1px solid #d1d5db; border-radius:8px; transition:.3s; }
.search-form input:focus { outline:none; border-color:#2563eb; box-shadow:0 0 0 2px rgba(37,99,235,0.3); }
.search-form button { background:#2563eb; color:white; padding:10px 16px; border-radius:8px; display:flex; align-items:center; gap:4px; transition:.3s; }
.search-form button:hover { background:#1e40af; transform:scale(1.05); }

.table-wrapper { overflow-x:auto; border-radius:10px; }
table { width:100%; border-collapse:collapse; min-width:800px; }
th, td { padding:12px 16px; border-bottom:1px solid #e5e7eb; text-align:left; }
th { background:linear-gradient(to right,#2563eb,#4f46e5); color:white; font-weight:600; }
tr:hover { background:#f3f4f6; }
.actions { display:flex; gap:8px; }
.actions a.edit { color:#2563eb; display:flex; align-items:center; gap:4px; font-weight:500; }
.actions a.edit:hover { color:#1e40af; }
.actions button.delete { color:#e94a4a; display:flex; align-items:center; gap:4px; border:none; background:none; cursor:pointer; font-weight:500; }
.actions button.delete:hover { color:#cc0000; }
.success-msg { background:#d1fae5; color:#065f46; padding:10px; border-radius:8px; margin-bottom:15px; text-align:center; font-weight:500; }
.link-btn { color:#2563eb; text-decoration:underline; }
.link-btn:hover { color:#1e40af; }

@media(max-width:768px){
    .search-form { flex-direction:column; }
    .search-form input, .search-form button { width:100%; }
    .title { font-size:2rem; }
}
</style>
@endsection

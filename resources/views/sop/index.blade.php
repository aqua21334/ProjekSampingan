@extends('layouts.app')

@section('content')
<div class="dashboard">
    <!-- Sidebar -->
<aside class="sidebar">
        <div class="logo">
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
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="btn-logout-red">
                <i data-lucide="log-out"></i> Logout
            </button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="content">
            <div class="sop-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="title">Daftar SOP</h2>
                    <a href="{{ route('sop.create') }}" class="btn-add">
                        <i data-lucide="plus-circle"></i> Tambah SOP
                    </a>
                </div>

                <!-- Search Form -->
                <form method="GET" action="" class="search-form">
                    <input type="text" name="kode_sop" value="{{ request('kode_sop') }}" placeholder="Cari Kode SOP" />
                    <input type="text" name="nama_sop" value="{{ request('nama_sop') }}" placeholder="Cari Nama SOP" />
                    <button type="submit"><i data-lucide="search"></i> Cari</button>
                </form>

                <!-- Table -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode SOP</th>
                                <th>Nama SOP</th>
                                <th>Deskripsi SOP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sops as $i => $sop)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $sop->kode_sop }}</td>
                                <td>{{ $sop->nama_sop }}</td>
                                <td>
                                    @if($sop->deskripsi_sop)
                                        <a href="{{ asset('storage/' . $sop->deskripsi_sop) }}" target="_blank" class="text-blue-500 hover:underline">Lihat File</a>
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada file</span>
                                    @endif
                                </td>
                                <td class="actions">
                                    <a href="{{ route('sop.edit', $sop->kode_sop) }}" class="edit">
                                        <i data-lucide="edit"></i> Edit
                                    </a>
                                    <form action="{{ route('sop.destroy', $sop->kode_sop) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="delete">
                                            <i data-lucide="trash-2"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data SOP.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<!-- Styles -->
<style>
.dashboard { display:flex; height:100vh; font-family: 'Inter', sans-serif; }
.sidebar { width:250px; background:#060E7E; color:#fff; padding:20px; display:flex; flex-direction:column; align-items:center; justify-content:flex-start; }
.logo { margin-bottom:50px; } /* Tambahkan jarak di bawah logo */
.logo-img { width:80px; height:80px; object-fit:cover; border-radius:10px; border:3px solid #7C62FF; transition: transform .3s; }
.logo-img:hover { transform: scale(1.05); }

.menu { list-style:none; padding:0; width:100%; }
.menu li { padding:12px; margin:8px 0; border-radius:10px; background:rgba(255,255,255,0.1); transition:.3s; }
.menu li.active { background:#fff; color:#060E7E; font-weight:bold; border:2px solid #7C62FF; }
.menu li a { display:flex; align-items:center; gap:10px; color:inherit; text-decoration:none; font-weight:500; }
.menu li:hover { background:rgba(255,255,255,0.2); transform: translateX(5px); }

.logout-form { margin-top:auto; width:100%; }
.btn-logout-red { padding:12px; width:100%; background:#E94A4A; border:none; color:white; border-radius:10px; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; transition: all 0.3s ease; }
.btn-logout-red:hover { background:#cc0000; transform:scale(1.05); }

.main-content { flex:1; padding:20px; background:#f9f9f9; overflow-y:auto; }
.sop-section { background:white; padding:20px; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.1); max-width:1000px; margin:auto; }

.title { font-size:2.5rem; font-weight:800; color:#111827; }
.btn-add { background:#2563eb; color:white; padding:10px 20px; border-radius:10px; display:flex; align-items:center; gap:8px; font-weight:500; transition:.3s; }
.btn-add:hover { background:#1e40af; transform:scale(1.05); }

.search-form { display:flex; gap:12px; margin-bottom:20px; flex-wrap:wrap; }
.search-form input { padding:10px; border:1px solid #d1d5db; border-radius:8px; width:200px; transition:.3s; }
.search-form input:focus { outline:none; border-color:#2563eb; box-shadow:0 0 0 2px rgba(37,99,235,0.3); }
.search-form button { background:#2563eb; color:white; padding:10px 16px; border-radius:8px; display:flex; align-items:center; gap:6px; transition:.3s; }
.search-form button:hover { background:#1e40af; transform:scale(1.05); }

.table-wrapper { overflow-x:auto; border-radius:10px; }
table { width:100%; border-collapse:collapse; min-width:700px; }
th, td { padding:12px 16px; border-bottom:1px solid #e5e7eb; text-align:left; }
th { background:linear-gradient(to right, #2563eb, #4f46e5); color:white; font-weight:600; }
tr:hover { background:#f3f4f6; }

.actions a, .actions button { display:flex; align-items:center; gap:4px; font-weight:500; border:none; background:none; cursor:pointer; }
.actions a.edit { color:#2563eb; }
.actions a.edit:hover { color:#1e40af; }
.actions button.delete { color:#e94a4a; }
.actions button.delete:hover { color:#cc0000; }

@media(max-width:768px){
    .search-form { flex-direction:column; }
    .search-form input, .search-form button { width:100%; }
    .title { font-size:2rem; }
}
</style>
@endsection

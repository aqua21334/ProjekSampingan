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
             <li class="{{ Route::currentRouteName() == 'pnpb.index' ? 'active' : '' }}">
                <a href="{{ route('pnpb.index') }}"><i data-lucide="dollar-sign"></i> PNBP</a>
            </li>
            <li class="{{ Route::currentRouteName() == 'literatur.index' ? 'active' : '' }}">
                <a href="{{ route('literatur.index') }}"><i data-lucide="book-open"></i> Literatur</a>
            </li>
        </ul>
        <form method="POST" action="{{ route('logout') }}" style="width:100%;">
            @csrf
            <button type="submit" class="logout-btn flex items-center gap-2">
                <i data-lucide="log-out"></i> Logout
            </button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="content">
            <div class="personil-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="title">Daftar PNBP</h2>
                    <a href="{{ route('pnpb.create') }}" class="btn-add">
                        <i data-lucide="plus-circle"></i> Tambah PNBP
                    </a>
                </div>
                <form method="GET" action="{{ route('pnpb.index') }}" style="margin-bottom: 24px; max-width: 400px;">
                    <div style="display: flex; gap: 8px;">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari kode billing atau pelanggan..." style="flex:1; padding:10px 14px; border-radius:8px; border:1px solid #ccc; font-size:15px;">
                        <button type="submit" style="background:#2563eb; color:white; border:none; border-radius:8px; padding:10px 18px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:6px;">
                            <i data-lucide="search"></i> Cari
                        </button>
                    </div>
                </form>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Billing</th>
                                <th>Pelanggan</th>
                                <th>Rupiah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pnpbs as $i => $pnpb)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $pnpb->kode_billing }}</td>
                                <td>{{ $pnpb->pelanggan }}</td>
                                <td>Rp {{ number_format($pnpb->rupiah, 2, '.', '.') }}</td>
                                <td class="actions">
                                    <a href="{{ route('pnpb.edit', $pnpb->kode_billing) }}" class="edit">
                                        <i data-lucide="edit"></i> Edit
                                    </a>
                                    <form action="{{ route('pnpb.destroy', $pnpb->kode_billing) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="delete" onclick="return confirm('Yakin hapus data?')">
                                            <i data-lucide="trash-2"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data PNBP.</td>
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
.sidebar { width:250px; background:#060E7E; color:#fff; padding:20px; display:flex; flex-direction:column; justify-content:space-between; height:100vh; }

/* Logo */
.logo { width:100%; display:flex; justify-content:center; align-items:center; margin-bottom:40px; }
.logo-img { width:80px; height:80px; border-radius:10px; border:3px solid #7C62FF; object-fit:cover; transition: transform .3s; }
.logo-img:hover { transform: scale(1.05); }

/* Menu */
.menu { list-style:none; padding:0; width:100%; flex-grow:1; }
.menu li { padding:12px; margin:8px 0; border-radius:10px; background:rgba(255,255,255,0.1); transition:.3s; }
.menu li.active { background:#fff; color:#060E7E; font-weight:bold; border:2px solid #7C62FF; }
.menu li a { display:flex; align-items:center; gap:10px; color:inherit; text-decoration:none; font-weight:500; }
.menu li:hover { background:rgba(255,255,255,0.2); transform: translateX(5px); }

/* Logout */
.logout-btn {
    background:#E94A4A;
    border:none;
    border-radius:10px;
    color:white;
    font-weight:500;
    padding:12px;
    width:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    cursor:pointer;
    transition: all 0.3s ease;
}
.logout-btn:hover { background:#cc0000; transform:scale(1.05); }

/* Main Content */
.main-content { flex:1; padding:20px; background:#f9f9f9; overflow-y:auto; }
.personil-section { background:white; padding:20px; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.1); max-width:1000px; margin:auto; }

/* Title & Button */
.title { font-size:2.5rem; font-weight:800; color:#111827; }
.btn-add { background:#2563eb; color:white; padding:10px 20px; border-radius:10px; display:flex; align-items:center; gap:8px; font-weight:500; transition:.3s; }
.btn-add:hover { background:#1e40af; transform:scale(1.05); }

/* Table */
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

/* Responsive */
@media(max-width:768px){
    .title { font-size:2rem; }
}
</style>
@endsection

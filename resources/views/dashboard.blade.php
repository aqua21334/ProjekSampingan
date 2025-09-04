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
            <li class="{{ Route::currentRouteName() == 'literatur.index' ? 'active' : '' }}">
                <a href="{{ route('literatur.index') }}"><i data-lucide="book-open"></i> Literatur</a>
            </li>
        </ul>

        <div style="flex:1"></div>
        <form method="POST" action="{{ route('logout') }}" style="width:100%;">
            @csrf
            <button type="submit" class="logout-btn"><i data-lucide="log-out"></i> Logout</button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="cards">
            <div class="card blue">
                <h3>Personil</h3>
                <p>{{ $personilCount }}</p>
                <i data-lucide="users" class="icon"></i>
            </div>
            <div class="card green">
                <h3>Peralatan</h3>
                <p>{{ $peralatanCount }}</p>
                <i data-lucide="package" class="icon"></i>
            </div>
            <div class="card yellow">
                <h3>SOP</h3>
                <p>{{ $sopCount }}</p>
                <i data-lucide="clipboard-list" class="icon"></i>
            </div>
            <div class="card pink">
                <h3>Laporan</h3>
                <p>{{ $laporanCount }}</p>
                <i data-lucide="bar-chart-2" class="icon"></i>
            </div>
        </div>

        <div class="content">
            <div class="permintaan-section">
                <h2>Permintaan Layanan</h2>
                @forelse($permintaanList as $permintaan)
                    <div class="box fade-in {{ strtolower($permintaan->status) }}">
                        <strong>{{ $permintaan->jenis_permintaan }}</strong>
                        <span class="status {{ strtolower($permintaan->status) }}">
                            {{ ucfirst($permintaan->status) }}
                        </span>
                    </div>
                @empty
                    <div class="box">Tidak ada permintaan layanan.</div>
                @endforelse
            </div>

            <div class="statistik-section">
                <h2>Statistik Layanan</h2>
                <div class="chart-container">
                    <canvas id="donutChart" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- ChartJS & Lucide -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>
    lucide.createIcons();

    const permintaanData = @json($permintaanAll);
    let selesai = 0, proses = 0, pending = 0;
    permintaanData.forEach(p => {
        if (p.status?.toLowerCase() === 'selesai') selesai++;
        else if (p.status?.toLowerCase() === 'proses') proses++;
        else if (p.status?.toLowerCase() === 'pending') pending++;
    });

    const ctx = document.getElementById('donutChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Diproses', 'Pending'],
            datasets: [{
                data: [selesai, proses, pending],
                backgroundColor: ['#22c55e', '#facc15', '#f87171'],
            }]
        },
        options: {
            animation: { animateScale: true, animateRotate: true },
            plugins: { legend: { position: 'top' } }
        }
    });
</script>

<style>
* { font-family: 'Inter', sans-serif; margin:0; padding:0; box-sizing:border-box; }

.dashboard { display: flex; height: 100vh; }

/* Sidebar */
.sidebar {
    width: 250px; background: #060E7E; color: #fff; padding: 20px; display: flex; flex-direction: column; align-items: center;
}
.sidebar .logo img { width: 80px; border-radius: 10px; border: 3px solid #7C62FF; margin-bottom: 40px; }
.sidebar .menu { list-style: none; padding: 0; width: 100%; }
.sidebar .menu li { padding: 12px; margin: 8px 0; text-align: left; background: rgba(255, 255, 255, 0.1); border-radius: 10px; transition: all 0.3s ease; }
.sidebar .menu li:hover { transform: translateX(5px); background: rgba(255,255,255,0.2); }
.sidebar .menu li a { display:flex; align-items:center; gap:10px; width:100%; color:inherit; text-decoration:none; font-weight:500; }
.sidebar .menu li.active { background:#fff; color:#060E7E; font-weight:bold; }
.sidebar .logout-btn { margin-top:auto; padding:12px; width:100%; background:rgba(255,80,80,0.8); border:none; color:white; border-radius:10px; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; transition: all 0.3s ease; }
.sidebar .logout-btn:hover { background:#ff3333; transform: scale(1.05); }

/* Main Content */
.main-content { flex:1; padding:20px; background:#f9f9f9; overflow-y:auto; }
.cards { display:grid; grid-template-columns: repeat(4, 1fr); gap:15px; margin-bottom:20px; }
.card { padding:25px; border-radius:15px; color:#fff; text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease; position:relative; overflow:hidden; }
.card:hover { transform: translateY(-10px) scale(1.03); box-shadow:0 12px 25px rgba(0,0,0,0.25); }
.card h3 { font-size:18px; margin-bottom:10px; font-weight:600; }
.card p { font-size:28px; font-weight:700; }
.card .icon { position:absolute; top:15px; right:15px; opacity:0.2; width:40px; height:40px; }

/* Gradient Cards */
.card.blue { background: linear-gradient(135deg, #2563eb, #1e3a8a); }
.card.green { background: linear-gradient(135deg, #16a34a, #065f46); }
.card.yellow { background: linear-gradient(135deg, #facc15, #ca8a04); color:#1f2937; }
.card.pink { background: linear-gradient(135deg, #ec4899, #be185d); }

/* Content Section */
.content { display:flex; gap:20px; flex-wrap:wrap; }
.permintaan-section, .statistik-section { flex:1 1 350px; min-width:600px; max-width:600px; background:white; padding:20px; border-radius:15px; box-shadow:0 4px 6px rgba(0,0,0,0.1); max-height:400px; overflow-y:auto; }
.permintaan-section h2, .statistik-section h2 { margin-bottom:15px; }

.box { background: rgba(59,0,255,0.05); margin:10px 0; padding:15px; border-radius:10px; font-weight:500; display:flex; justify-content:space-between; align-items:center; transition: all 0.3s ease; }
.box:hover { background: rgba(59,0,255,0.15); transform: translateX(5px); }
.status.selesai { color:#22c55e; font-weight:700; }
.status.proses { color:#facc15; font-weight:700; }
.status.pending { color:#f87171; font-weight:700; }

/* Chart Container */
.chart-container { display:flex; justify-content:center; align-items:center; max-width:350px; max-height:350px; margin:0 auto; }

/* Animations */
@keyframes fadeInUp { from { transform: translateY(20px); opacity:0; } to { transform: translateY(0); opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
.fade-in { animation: fadeIn 0.8s ease; }
</style>
@endsection

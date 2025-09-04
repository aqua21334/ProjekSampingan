@extends('layouts.app')

@section('content')
<div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
                                <a href="{{ route('dashboard') }}">
                                    <img src="data:image/png;base64,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" alt="Logo" />
                                </a>

        </div>
        <ul class="menu">
                <li class="{{ Route::currentRouteName() == 'personil.index' ? 'active' : '' }}">
                    <a href="{{ route('personil.index') }}" style="display:block;width:100%;height:100%;color:inherit;text-decoration:none;">Personil</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'peralatan.index' ? 'active' : '' }}">
                    <a href="{{ route('peralatan.index') }}" style="display:block;width:100%;height:100%;color:inherit;text-decoration:none;">Peralatan</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'sop.index' ? 'active' : '' }}">
                    <a href="{{ route('sop.index') }}" style="display:block;width:100%;height:100%;color:inherit;text-decoration:none;">Daftar SOP</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'dokumen.index' ? 'active' : '' }}">
                    <a href="{{ route('dokumen.index') }}" style="display:block;width:100%;height:100%;color:inherit;text-decoration:none;">Dokumen</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'permintaan.index' ? 'active' : '' }}">
                    <a href="{{ route('permintaan.index') }}" style="display:block;width:100%;height:100%;color:inherit;text-decoration:none;">Permintaan Layanan</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'laporan.index' ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}" style="display:block;width:100%;height:100%;color:inherit;text-decoration:none;">Laporan Hasil</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'literatur.index' ? 'active' : '' }}">
                    <a href="{{ route('literatur.index') }}" style="display:block;width:100%;height:100%;color:inherit;text-decoration:none;">Literatur</a>
                </li>
        </ul>
        <!-- ...existing code... -->
        <div style="flex:1"></div>
        <form method="POST" action="{{ route('logout') }}" style="width:100%;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="cards">
            <div class="card blue">
                <h3>Personil</h3>
                <p>{{ $personilCount }}</p>
            </div>
            <div class="card green">
                <h3>Peralatan</h3>
                <p>{{ $peralatanCount }}</p>
            </div>
            <div class="card yellow">
                <h3>SOP</h3>
                <p>{{ $sopCount }}</p>
            </div>
            <div class="card pink">
                <h3>Laporan</h3>
                <p>{{ $laporanCount }}</p>
            </div>
        </div>

<div class="content">
    <div class="permintaan-section">
        <h2>Permintaan Layanan</h2>
        @forelse($permintaanList as $permintaan)
            <div class="box">
                {{ $permintaan->jenis_permintaan }} - 
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

  <!-- ChartJS Donut -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
            const permintaanData = @json($permintaanAll);
            // Hitung jumlah status
            let selesai = 0, proses = 0, pending = 0;
            permintaanData.forEach(p => {
                if (p.status && p.status.toLowerCase() === 'selesai') selesai++;
                else if (p.status && p.status.toLowerCase() === 'proses') proses++;
                else if (p.status && p.status.toLowerCase() === 'pending') pending++;
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
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
  </script>

<style>
.dashboard {
    display: flex;
    height: 100vh;
}
.sidebar {
    width: 250px;
    background: #060E7E;
    color: #fff;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.sidebar .logo img {
    width: 80px;
    border-radius: 10px;
    border: 3px solid #7C62FF;
    margin-bottom: 40px;
}
.sidebar .menu {
    list-style: none;
    padding: 0;
    width: 100%;
}
.sidebar .menu li {
    padding: 15px;
    margin: 10px 0;
    text-align: center;
    background: rgba(255,255,255,0.1);
    border-radius: 10px;
    cursor: pointer;
}
/* Highlight menu yang aktif */
.sidebar .menu li.active {
    background: #fff;
    color: #2c2c2dff;
    font-weight: bold;
    border: 2px solid #edededff;
}
.sidebar .menu li.active a {
    color: #dbdce2ff !important;
}
.sidebar .logout-btn {
    margin-top: auto;
    padding: 12px;
    width: 100%;
    background: rgba(255, 80, 80, 0.8);
    border: none;
    color: white;
    border-radius: 10px;
    cursor: pointer;
}
.main-content {
    flex: 1;
    padding: 20px;
    background: #f9f9f9;
}
.cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 20px;
}
.card {
    padding: 20px;
    border-radius: 15px;
    color: white;
    text-align: center;
}
.card.blue { background: linear-gradient(90deg, #0230e7, #00157e); }
.card.green { background: linear-gradient(90deg, #04b60d, #05700a); }
.card.yellow { background: linear-gradient(270deg, #745f00, #dab200); }
.card.pink { background: linear-gradient(90deg, #ff0295, #d300a6); }

.content-section {
    margin-bottom: 20px;
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.box {
    background: rgba(59,0,255,0.05);
    margin: 10px 0;
    padding: 15px;
    border-radius: 10px;
}
.status {
    font-weight: bold;
}
.status.selesai { color: green; }
.status.proses { color: #666600; }
.status.belum { color: red; }

.content {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}
.permintaan-section, .statistik-section {
    flex: 1 1 350px;
    min-width: 600px;
    max-width: 600px;
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    max-height: 400px;
    overflow-y: auto;
}

.chart-container {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 350px;
    max-height: 350px;
    margin: 0 auto;
}
.chart-container canvas {
    width: 100% !important;
    height: auto !important;
}
</style>
@endsection

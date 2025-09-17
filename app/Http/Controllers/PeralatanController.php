<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use Illuminate\Http\Request;

class PeralatanController extends Controller
{
    // Tampilkan form edit peralatan
    public function edit($kode_bmn)
    {
        $peralatan = Peralatan::where('kode_bmn', $kode_bmn)->firstOrFail();
        return view('peralatan.edit', compact('peralatan'));
    }
        // Tampilkan form tambah peralatan
        public function create()
        {
            return view('peralatan.create');
        }
    // Tampilkan halaman index peralatan (dengan filter pencarian)
    public function index(Request $request)
    {
        $query = Peralatan::query();

        // Filter pencarian
        if ($request->filled('kode_bmn')) {
            $query->where('kode_bmn', 'like', '%' . $request->kode_bmn . '%');
        }
        if ($request->filled('nama_peralatan')) {
            $query->where('nama_peralatan', 'like', '%' . $request->nama_peralatan . '%');
        }
        if ($request->filled('tanggal_kalibrasi')) {
            $query->where('tanggal_kalibrasi', $request->tanggal_kalibrasi);
        }

        // Urutkan agar status 'Belum' di atas
        $query->orderByRaw("CASE WHEN status_kalibrasi = 'Belum' THEN 0 ELSE 1 END")
              ->orderBy('status_kalibrasi')
              ->orderBy('nama_peralatan');

        $peralatans = $query->get();

        return view('peralatan.index', compact('peralatans'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_bmn' => 'required|string|max:30|unique:peralatans,kode_bmn',
            'nama_peralatan' => 'required|string|max:50',
            'tanggal_kalibrasi' => 'nullable|date',
            'status_kalibrasi' => 'required|in:Sudah,Belum',
        ]);

        $peralatan = Peralatan::create([
            'kode_bmn' => $request->kode_bmn,
            'nama_peralatan' => $request->nama_peralatan,
            'tanggal_kalibrasi' => $request->tanggal_kalibrasi,
            'status_kalibrasi' => $request->status_kalibrasi,
        ]);

        // Redirect to index with success message for web requests
        return redirect()->route('peralatan.index')
            ->with('success', 'Data peralatan berhasil disimpan');
    }

    // Detail peralatan
    public function show($kode_bmn)
    {
        $peralatan = Peralatan::where('kode_bmn', $kode_bmn)->firstOrFail();
        return response()->json($peralatan);
    }

    // Update data peralatan
    public function update(Request $request, $kode_bmn)
    {
        $peralatan = Peralatan::where('kode_bmn', $kode_bmn)->firstOrFail();
        $request->validate([
            'kode_bmn' => 'required|string|max:30|unique:peralatans,kode_bmn,' . $peralatan->kode_bmn . ',kode_bmn',
            'nama_peralatan' => 'required|string|max:50',
            'tanggal_kalibrasi' => 'nullable|date',
            'status_kalibrasi' => 'required|in:Sudah,Belum',
        ]);

        $peralatan->update([
            'kode_bmn' => $request->kode_bmn,
            'nama_peralatan' => $request->nama_peralatan,
            'tanggal_kalibrasi' => $request->tanggal_kalibrasi,
            'status_kalibrasi' => $request->status_kalibrasi,
        ]);

        return redirect()->route('peralatan.index')->with('success', 'Data peralatan berhasil diupdate');
    }

    // Hapus peralatan
    public function destroy($kode_bmn)
    {
    $peralatan = Peralatan::where('kode_bmn', $kode_bmn)->firstOrFail();
    $peralatan->delete();
    return redirect()->route('peralatan.index')->with('success', 'Peralatan sudah dihapus');
    }
}
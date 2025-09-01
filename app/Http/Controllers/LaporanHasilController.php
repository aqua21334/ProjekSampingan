<?php

namespace App\Http\Controllers;

use App\Models\LaporanHasil;
use Illuminate\Http\Request;

class LaporanHasilController extends Controller
{
    // List semua laporan
    public function index()
    {
        return response()->json(LaporanHasil::all());
    }

    // Tambah laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'isi_laporan' => 'required',
            'dibuat_oleh' => 'required|string|max:100',
        ]);

        $laporan = LaporanHasil::create($request->all());

        return response()->json($laporan, 201);
    }

    // Detail laporan
    public function show($id)
    {
        $laporan = LaporanHasil::findOrFail($id);
        return response()->json($laporan);
    }

    // Update laporan
    public function update(Request $request, $id)
    {
        $laporan = LaporanHasil::findOrFail($id);
        $laporan->update($request->all());

        return response()->json($laporan);
    }

    // Hapus laporan
    public function destroy($id)
    {
        $laporan = LaporanHasil::findOrFail($id);
        $laporan->delete();

        return response()->json(['message' => 'Laporan berhasil dihapus']);
    }
}


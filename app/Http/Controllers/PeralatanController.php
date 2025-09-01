<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use Illuminate\Http\Request;

class PeralatanController extends Controller
{
    // Ambil semua data peralatan
    public function index()
    {
        return response()->json(Peralatan::all());
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_bmn' => 'required|unique:peralatans',
            'nama_peralatan' => 'required',
        ]);

        $peralatan = Peralatan::create($request->all());
        return response()->json($peralatan, 201);
    }

    // Detail peralatan
    public function show($kode_bmn)
    {
        $peralatan = Peralatan::findOrFail($kode_bmn);
        return response()->json($peralatan);
    }

    // Update data peralatan
    public function update(Request $request, $kode_bmn)
    {
        $peralatan = Peralatan::findOrFail($kode_bmn);
        $peralatan->update($request->all());
        return response()->json($peralatan);
    }

    // Hapus peralatan
    public function destroy($kode_bmn)
    {
        $peralatan = Peralatan::findOrFail($kode_bmn);
        $peralatan->delete();
        return response()->json(['message' => 'Peralatan berhasil dihapus']);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    // Ambil semua SOP
    public function index()
    {
        return response()->json(Sop::all());
    }

    // Simpan SOP baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_sop' => 'required|unique:sops',
            'nama_sop' => 'required',
        ]);

        $sop = Sop::create($request->all());
        return response()->json($sop, 201);
    }

    // Detail SOP
    public function show($kode_sop)
    {
        $sop = Sop::findOrFail($kode_sop);
        return response()->json($sop);
    }

    // Update SOP
    public function update(Request $request, $kode_sop)
    {
        $sop = Sop::findOrFail($kode_sop);
        $sop->update($request->all());
        return response()->json($sop);
    }

    // Hapus SOP
    public function destroy($kode_sop)
    {
        $sop = Sop::findOrFail($kode_sop);
        $sop->delete();
        return response()->json(['message' => 'SOP berhasil dihapus']);
    }
}

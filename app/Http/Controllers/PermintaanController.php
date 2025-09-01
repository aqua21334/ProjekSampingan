<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    // List semua permintaan
    public function index()
    {
        return response()->json(Permintaan::all());
    }

    // Tambah permintaan baru
    public function store(Request $request)
    {
        $request->validate([
            'pemohon' => 'required|string|max:100',
            'jenis_permintaan' => 'required|string|max:100',
        ]);

        $permintaan = Permintaan::create($request->all());

        return response()->json($permintaan, 201);
    }

    // Detail permintaan
    public function show($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        return response()->json($permintaan);
    }

    // Update status/keterangan
    public function update(Request $request, $id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $permintaan->update($request->all());

        return response()->json($permintaan);
    }

    // Hapus permintaan
    public function destroy($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $permintaan->delete();

        return response()->json(['message' => 'Permintaan berhasil dihapus']);
    }
}
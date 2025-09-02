<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    // Tampilkan form edit permintaan
    public function edit($id)
    {
        // Cari berdasarkan id_permintaan
        $permintaan = Permintaan::where('id_permintaan', $id)->firstOrFail();
        return view('permintaan.edit', compact('permintaan'));
    }
    // Tampilkan form tambah permintaan
    public function create()
    {
        return view('permintaan.create');
    }
    // List semua permintaan
    public function index()
    {
        $permintaans = Permintaan::all();
        return view('permintaan.index', compact('permintaans'));
    }

    // Tambah permintaan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_permintaan' => 'required|string|max:20|unique:permintaans,id_permintaan',
            'pemohon' => 'required|string|max:100',
            'jenis_permintaan' => 'required|string|max:100',
            'status' => 'nullable|string|max:50',
            'keterangan' => 'nullable|string',
        ]);
        if (empty($validated['status'])) {
            $validated['status'] = 'pending';
        }
        $permintaan = Permintaan::create($validated);
        return redirect()->route('permintaan.index')->with('success', 'Permintaan berhasil disimpan');
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
        // Cari berdasarkan id_permintaan
        $permintaan = Permintaan::where('id_permintaan', $id)->firstOrFail();
        $validated = $request->validate([
            'id_permintaan' => 'required|string|max:20|unique:permintaans,id_permintaan,' . $permintaan->no . ',no',
            'pemohon' => 'required|string|max:100',
            'jenis_permintaan' => 'required|string|max:100',
            'status' => 'nullable|string|max:50',
            'keterangan' => 'nullable|string',
        ]);
        if (empty($validated['status'])) {
            $validated['status'] = 'pending';
        }
        $permintaan->update($validated);
        return redirect()->route('permintaan.index')->with('success', 'Permintaan berhasil diupdate');
    }

    // Hapus permintaan
    public function destroy($id)
    {
    $permintaan = Permintaan::findOrFail($id);
    $permintaan->delete();
    return redirect()->route('permintaan.index')->with('success', 'Permintaan berhasil dihapus');
    }
}
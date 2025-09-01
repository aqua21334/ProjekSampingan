<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    // List semua dokumen
    public function index()
    {
        return response()->json(Dokumen::all());
    }

    // Tambah dokumen baru (hanya simpan link Google Drive)
    public function store(Request $request)
    {
        $request->validate([
            'jenis_dokumen' => 'required',
            'judul' => 'required',
            'file_url' => 'required|url',
        ]);

        $dokumen = Dokumen::create([
            'jenis_dokumen' => $request->jenis_dokumen,
            'judul' => $request->judul,
            'file_url' => $request->file_url, // simpan link drive
            'upload_by' => $request->upload_by,
        ]);

        return response()->json($dokumen, 201);
    }

    // Detail dokumen
    public function show($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return response()->json($dokumen);
    }

    // Update dokumen
    public function update(Request $request, $id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $dokumen->update($request->all());
        return response()->json($dokumen);
    }

    // Hapus dokumen
    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $dokumen->delete();
        return response()->json(['message' => 'Dokumen berhasil dihapus']);
    }
}

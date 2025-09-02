<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;


class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::all();
        return view('dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_dokumen' => 'required|string|max:20|unique:dokumens,id_dokumen',
            'jenis_dokumen' => 'required|max:50',
            'judul' => 'required|max:150',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file')->store('dokumen', 'public');
        $dokumen = Dokumen::create([
            'id_dokumen' => $validated['id_dokumen'],
            'jenis_dokumen' => $validated['jenis_dokumen'],
            'judul' => $validated['judul'],
            'file_url' => $filePath,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dokumen = Dokumen::where('id_dokumen', $id)->firstOrFail();
        return view('dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, $id)
    {
        $dokumen = Dokumen::where('id_dokumen', $id)->firstOrFail();
        $validated = $request->validate([
            'id_dokumen' => 'required|string|max:20|unique:dokumens,id_dokumen,' . $dokumen->id_dokumen . ',id_dokumen',
            'jenis_dokumen' => 'required|max:50',
            'judul' => 'required|max:150',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($dokumen->file_url && \Storage::disk('public')->exists($dokumen->file_url)) {
                \Storage::disk('public')->delete($dokumen->file_url);
            }
            $filePath = $request->file('file')->store('dokumen', 'public');
            $dokumen->file_url = $filePath;
        }
        $dokumen->id_dokumen = $validated['id_dokumen'];
        $dokumen->jenis_dokumen = $validated['jenis_dokumen'];
        $dokumen->judul = $validated['judul'];
        $dokumen->save();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diupdate.');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::where('id_dokumen', $id)->firstOrFail();
        if ($dokumen->file_url && \Storage::disk('public')->exists($dokumen->file_url)) {
            \Storage::disk('public')->delete($dokumen->file_url);
        }
        $dokumen->delete();
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}

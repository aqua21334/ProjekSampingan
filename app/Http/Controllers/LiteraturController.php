<?php

namespace App\Http\Controllers;

use App\Models\Literatur;
use Illuminate\Http\Request;

class LiteraturController extends Controller
{
    // List semua literatur dengan fitur pencarian
    public function index(Request $request)
    {
        $query = Literatur::query();
        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }
        if ($request->filled('penulis')) {
            $query->where('penulis', 'like', '%' . $request->penulis . '%');
        }
        $literaturs = $query->orderBy('id_literatur', 'asc')->get();
        return view('literatur.index', compact('literaturs'));
    }

    // Tampilkan form tambah literatur
    public function create()
    {
        return view('literatur.create');
    }

    // Simpan literatur baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'penulis' => 'nullable|string|max:150',
            'tahun' => 'nullable|string|max:4',
            'penerbit' => 'nullable|string|max:150',
            'sni_number' => 'nullable|string|max:100',
            'link' => 'nullable|string|max:255',
        ]);
        Literatur::create($validated);
        return redirect()->route('literatur.index')->with('success', 'Literatur berhasil ditambahkan.');
    }

    // Tampilkan form edit literatur
    public function edit($id)
    {
        $literatur = Literatur::findOrFail($id);
        return view('literatur.edit', compact('literatur'));
    }

    // Update literatur
    public function update(Request $request, $id)
    {
        $literatur = Literatur::findOrFail($id);
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'penulis' => 'nullable|string|max:150',
            'tahun' => 'nullable|string|max:4',
            'penerbit' => 'nullable|string|max:150',
            'sni_number' => 'nullable|string|max:100',
            'link' => 'nullable|string|max:255',
        ]);
        $literatur->update($validated);
        return redirect()->route('literatur.index')->with('success', 'Literatur berhasil diupdate.');
    }

    // Hapus literatur
    public function destroy($id)
    {
        $literatur = Literatur::findOrFail($id);
        $literatur->delete();
        return redirect()->route('literatur.index')->with('success', 'Literatur berhasil dihapus.');
    }
}

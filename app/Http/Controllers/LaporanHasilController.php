<?php

namespace App\Http\Controllers;

use App\Models\LaporanHasil;
use Illuminate\Http\Request;

class LaporanHasilController extends Controller
{


    // Tampilkan form edit laporan
    public function edit($id)
    {
        $laporan = LaporanHasil::findOrFail($id);
        return view('laporan_hasil.edit', compact('laporan'));
    }
    // List semua laporan dengan fitur pencarian
    public function index(Request $request)
    {
        $query = LaporanHasil::query();
        if ($request->filled('id_laporan')) {
            $query->where('id_laporan', 'like', '%' . $request->id_laporan . '%');
        }
        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }
        $laporan_hasils = $query->orderBy('id_laporan', 'asc')->get();
        return view('laporan_hasil.index', compact('laporan_hasils'));
    }

    // Tampilkan form tambah laporan
    public function create()
    {
        return view('laporan_hasil.create');
    }

    // Tambah laporan baru
    public function store(Request $request)
    {
            $validated = $request->validate([
                'id_laporan' => 'required|string|max:20|unique:laporan_hasils,id_laporan',
                'judul' => 'required|string|max:255',
                'file_pdf' => 'required|file|mimes:pdf|max:2048',
                'tanggal_laporan' => 'required|date',
            ]);

            // Handle file upload
            if ($request->hasFile('file_pdf')) {
                $file = $request->file('file_pdf');
                $path = $file->store('laporan_pdf', 'public');
                $validated['file_pdf'] = $path;
            }

            $validated['created_at'] = now();
            LaporanHasil::create($validated);
            return redirect()->route('laporan_hasil.index')->with('success', 'Laporan berhasil ditambahkan.');
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
        $validated = $request->validate([
            'id_laporan' => 'required|string|max:20|unique:laporan_hasils,id_laporan,' . $laporan->id_laporan . ',id_laporan',
            'judul' => 'required|string|max:255',
            'file_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'tanggal_laporan' => 'required|date',
        ]);

        // Handle file upload
        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $path = $file->store('laporan_pdf', 'public');
            $validated['file_pdf'] = $path;
        } else {
            // Pakai file lama jika tidak upload baru
            $validated['file_pdf'] = $request->input('file_pdf_lama');
        }

        $validated['created_at'] = $laporan->created_at;
        $laporan->update($validated);
        return redirect()->route('laporan_hasil.index')->with('success', 'Laporan berhasil diupdate.');
    }

    // Hapus laporan
    public function destroy($id)
    {
        $laporan = LaporanHasil::findOrFail($id);
        $laporan->delete();
        return redirect()->route('laporan_hasil.index')->with('success', 'Laporan berhasil dihapus.');
    }
}


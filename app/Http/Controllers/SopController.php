<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    // Tampilkan form edit SOP
    public function edit($kode_sop)
    {
        $kode_sop = urldecode($kode_sop);
        $sop = Sop::where('kode_sop', $kode_sop)->firstOrFail();
        return view('sop.edit', compact('sop'));
    }
    // Tampilkan form tambah SOP
    public function create()
    {
        return view('sop.create');
    }
    // Tampilkan detail SOP (view)
    public function show($kode_sop)
    {
        $sop = Sop::where('kode_sop', $kode_sop)->firstOrFail();
        return view('sop.show', compact('sop'));
    }
    // Tampilkan halaman index SOP (dengan filter pencarian)
    public function index(Request $request)
    {
        $query = Sop::query();

        if ($request->filled('kode_sop')) {
            $query->where('kode_sop', 'like', '%' . $request->kode_sop . '%');
        }
        if ($request->filled('nama_sop')) {
            $query->where('nama_sop', 'like', '%' . $request->nama_sop . '%');
        }

        $sops = $query->get();

        return view('sop.index', compact('sops'));
    }

    // Simpan SOP baru dengan upload file deskripsi
    public function store(Request $request)
    {
        $request->validate([
            'kode_sop' => 'required|unique:sops',
            'nama_sop' => 'required',
            'deskripsi_sop' => 'required|file|mimes:pdf,doc,docx,txt',
        ]);

        $filePath = null;
        if ($request->hasFile('deskripsi_sop')) {
            $filePath = $request->file('deskripsi_sop')->store('sop_files', 'public');
        }

        $sop = new Sop();
        $sop->kode_sop = $request->kode_sop;
        $sop->nama_sop = $request->nama_sop;
        $sop->deskripsi_sop = $filePath;
        $sop->save();

        return redirect()->route('sop.index')->with('success', 'SOP berhasil ditambahkan');
    }

    // ...existing code...

    // Update SOP dengan upload file deskripsi
    public function update(Request $request, $kode_sop)
    {
        $sop = Sop::findOrFail($kode_sop);
        $request->validate([
            'kode_sop' => 'required|unique:sops,kode_sop,' . $sop->kode_sop . ',kode_sop',
            'nama_sop' => 'required',
            'deskripsi_sop' => 'nullable|file|mimes:pdf,doc,docx,txt',
        ]);

        $sop->kode_sop = $request->kode_sop;
        $sop->nama_sop = $request->nama_sop;
        if ($request->hasFile('deskripsi_sop')) {
            $filePath = $request->file('deskripsi_sop')->store('sop_files', 'public');
            $sop->deskripsi_sop = $filePath;
        }
        $sop->save();

        return redirect()->route('sop.index')->with('success', 'SOP berhasil diupdate');
    }

    // Hapus SOP
    public function destroy($kode_sop)
    {
        $sop = Sop::where('kode_sop', $kode_sop)->firstOrFail();
        $sop->delete();
        return redirect()->route('sop.index')->with('success', 'SOP berhasil dihapus');
    }
}

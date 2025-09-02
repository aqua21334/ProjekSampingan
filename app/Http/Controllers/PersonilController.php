<?php

namespace App\Http\Controllers;

use App\Models\Personil;
use Illuminate\Http\Request;

class PersonilController extends Controller
{
    // Tampilkan form edit personil
    public function edit($nip)
    {
        $personil = Personil::findOrFail($nip);
        return view('personil.edit', compact('personil'));
    }

    // Update data personil
    public function update(Request $request, $nip)
    {
        $request->validate([
            'nip' => 'required|unique:personils,nip,' . $nip . ',nip',
            'nama_personil' => 'required',
            'jabatan' => 'required',
        ]);
        $personil = Personil::findOrFail($nip);
        $personil->nip = $request->nip;
        $personil->nama_personil = $request->nama_personil;
        $personil->jabatan = $request->jabatan;
        $personil->no_hp = $request->no_hp;
        $personil->email = $request->email;
        $personil->save();
        return redirect()->route('personil.index')->with('success', 'Personil berhasil diupdate');
    }
    // Tampilkan form input personil
    public function create()
    {
        return view('personil.create');
    }
    // Ambil semua data personil dan tampilkan di view
    public function index(Request $request)
    {
        $query = Personil::query();
        if ($request->filled('nip')) {
            $query->where('nip', 'like', '%' . $request->nip . '%');
        }
        if ($request->filled('nama_personil')) {
            $query->where('nama_personil', 'like', '%' . $request->nama_personil . '%');
        }
        $personils = $query->get();
        return view('personil.index', compact('personils'));
    }

    // Simpan data personil baru
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:personils',
            'nama_personil' => 'required',
            'jabatan' => 'required',
        ]);

        $personil = Personil::create([
            'nip' => $request->nip,
            'nama_personil' => $request->nama_personil,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);
        return redirect()->route('personil.index')->with('success', 'Personil berhasil ditambahkan');
    }

    // Tampilkan detail personil
    public function show($nip)
    {
        $personil = Personil::findOrFail($nip);
        return response()->json($personil);
    }


    // Hapus personil
    public function destroy($nip)
    {
    $personil = Personil::findOrFail($nip);
    $personil->delete();
    return redirect()->route('personil.index')->with('success', 'Personil telah dihapus');
    }
}

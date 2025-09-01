<?php

namespace App\Http\Controllers;

use App\Models\Personil;
use Illuminate\Http\Request;

class PersonilController extends Controller
{
    // Ambil semua data personil
    public function index()
    {
        return response()->json(Personil::all());
    }

    // Simpan data personil baru
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:personils',
            'nama_personil' => 'required',
        ]);

        $personil = Personil::create($request->all());
        return response()->json($personil, 201);
    }

    // Tampilkan detail personil
    public function show($nip)
    {
        $personil = Personil::findOrFail($nip);
        return response()->json($personil);
    }

    // Update data personil
    public function update(Request $request, $nip)
    {
        $personil = Personil::findOrFail($nip);
        $personil->update($request->all());
        return response()->json($personil);
    }

    // Hapus personil
    public function destroy($nip)
    {
        $personil = Personil::findOrFail($nip);
        $personil->delete();
        return response()->json(['message' => 'Personil berhasil dihapus']);
    }
}

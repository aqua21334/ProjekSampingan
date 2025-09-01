<?php

namespace App\Http\Controllers;

use App\Models\Literatur;
use Illuminate\Http\Request;

class LiteraturController extends Controller
{
    // List semua literatur
    public function index()
    {
        return response()->json(Literatur::all());
    }

    // Tambah literatur baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'sni_number' => 'nullable|string|max:100',
        ]);

        $literatur = Literatur::create($request->all());

        return response()->json($literatur, 201);
    }

    // Detail literatur
    public function show($id)
    {
        $literatur = Literatur::findOrFail($id);
        return response()->json($literatur);
    }

    // Update literatur
    public function update(Request $request, $id)
    {
        $literatur = Literatur::findOrFail($id);
        $literatur->update($request->all());

        return response()->json($literatur);
    }

    // Hapus literatur
    public function destroy($id)
    {
        $literatur = Literatur::findOrFail($id);
        $literatur->delete();

        return response()->json(['message' => 'Literatur berhasil dihapus']);
    }
}

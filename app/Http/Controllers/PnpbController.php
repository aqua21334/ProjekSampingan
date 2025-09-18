<?php

namespace App\Http\Controllers;

use App\Models\Pnpb;
use Illuminate\Http\Request;

class PnpbController extends Controller
{
    public function index(Request $request)
    {
        $query = Pnpb::query();
        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function($sub) use ($q) {
                $sub->where('kode_billing', 'like', "%$q%")
                    ->orWhere('pelanggan', 'like', "%$q%");
            });
        }
        $pnpbs = $query->get();
        return view('pnpb.index', compact('pnpbs'));
    }

    public function create()
    {
        return view('pnpb.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_billing' => 'required|string|max:50|unique:pnpbs,kode_billing',
            'pelanggan' => 'required|string|max:255',
            'rupiah' => 'required|numeric',
        ]);
        Pnpb::create($validated);
        return redirect()->route('pnpb.index')->with('success', 'Data PNBP berhasil ditambahkan.');
    }


    public function edit($kode_billing)
    {
        $pnpb = Pnpb::where('kode_billing', $kode_billing)->firstOrFail();
        return view('pnpb.edit', compact('pnpb'));
    }

    public function update(Request $request, $kode_billing)
    {
        $pnpb = Pnpb::where('kode_billing', $kode_billing)->firstOrFail();
        $validated = $request->validate([
            'kode_billing' => 'required|string|max:50|unique:pnpbs,kode_billing,' . $pnpb->kode_billing . ',kode_billing',
            'pelanggan' => 'required|string|max:255',
            'rupiah' => 'required|numeric',
        ]);
        $pnpb->update($validated);
        return redirect()->route('pnpb.index')->with('success', 'Data PNBP berhasil diupdate.');
    }

    public function destroy($kode_billing)
    {
        $pnpb = Pnpb::where('kode_billing', $kode_billing)->firstOrFail();
        $pnpb->delete();
        return redirect()->route('pnpb.index')->with('success', 'Data PNBP berhasil dihapus.');
    }
}

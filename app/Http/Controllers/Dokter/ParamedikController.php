<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class ParamedikController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        return view('dokter.paramedik.index', compact('kecamatans'));
    }

    public function create()
    {
        return view('dokter.paramedik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kecamatan::create($request->all());
        return redirect()->route('dokter.paramedik.list')->with('success', 'Kecamatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('dokter.paramedik.edit', compact('kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kecamatan = Kecamatan::find($id);
        $kecamatan->update($request->all());
        return redirect()->route('dokter.paramedik.list')->with('success', 'Kecamatan berhasil diupdate');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->delete();
        return redirect()->route('dokter.paramedik.list')->with('success', 'Kecamatan berhasil dihapus');
    }
}

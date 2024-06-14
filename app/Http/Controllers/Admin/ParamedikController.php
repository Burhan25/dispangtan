<?php

namespace App\Http\Controllers\Admin;
use App\Models\DokterParamedik;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class ParamedikController extends Controller
{
    // public function index()
    // {
    //     $kecamatans = Kecamatan::all();
    //     return view('admin.paramedik.index', compact('kecamatans'));
    // }

    public function create()
    {
        return view('admin.paramedik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kecamatan::create($request->all());
        return redirect()->route('admin.paramedik.list')->with('success', 'Kecamatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('admin.paramedik.edit', compact('kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kecamatan = Kecamatan::find($id);
        $kecamatan->update($request->all());
        return redirect()->route('admin.paramedik.list')->with('success', 'Kecamatan berhasil diupdate');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->delete();
        return redirect()->route('admin.paramedik.list')->with('success', 'Kecamatan berhasil dihapus');
    }
// Methods for DokterParamedik
public function index()
{
    $dokterParamediks = DokterParamedik::all();
    $kecamatans = Kecamatan::all();
    return view('admin.paramedik.index', compact('dokterParamediks', 'kecamatans'));
}

public function createDokterParamedik()
{
    return view('admin.paramedik.create');
}

public function storeDokterParamedik(Request $request)
{
    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nama' => 'required|string|max:255',
        'spesialis' => 'required|string|max:255',
        'domisili' => 'required|string|max:255',
        'nomor_whatsapp' => 'required|string|max:15',
    ]);

    if ($request->hasFile('foto')) {
        $imageName = time().'.'.$request->foto->extension();  
        $request->foto->move(public_path('images'), $imageName);
    } else {
        $imageName = null;
    }

    DokterParamedik::create([
        'foto' => $imageName,
        'nama' => $request->nama,
        'spesialis' => $request->spesialis,
        'domisili' => $request->domisili,
        'nomor_str' => $request->nomor_str,
        'nomor_whatsapp' => $request->nomor_whatsapp,
    ]);

    return redirect()->route('admin.paramedik.index')->with('success', 'Paramedik berhasil ditambahkan');
}

public function editDokterParamedik($id)
{
    $dokterParamedik = DokterParamedik::find($id);
    return view('admin.paramedik.edit', compact('dokterParamedik'));
}

public function updateDokterParamedik(Request $request, $id)
{
    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nama' => 'required|string|max:255',
        'spesialis' => 'required|string|max:255',
        'domisili' => 'required|string|max:255',
        'nomor_whatsapp' => 'required|string|max:15',
    ]);

    $dokterParamedik = DokterParamedik::find($id);

    if ($request->hasFile('foto')) {
        $imageName = time().'.'.$request->foto->extension();  
        $request->foto->move(public_path('images'), $imageName);
        $dokterParamedik->foto = $imageName;
    }

    $dokterParamedik->update($request->all());
    return redirect()->route('admin.paramedik.index')->with('success', 'Paramedik berhasil diupdate');
}

public function destroyDokterParamedik($id)
{
    $dokterParamedik = DokterParamedik::find($id);
    $dokterParamedik->delete();
    return redirect()->route('admin.paramedik.index')->with('success', 'Paramedik berhasil dihapus');
}
}

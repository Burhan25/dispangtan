<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokterParamedik;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class ParamedikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $paramedik = DokterParamedik::with('domisiliId')->get();

        return view('admin.paramedik.index', compact('kecamatan', 'paramedik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.paramedik.create', compact('kecamatan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DokterParamedik::query()->create($request->all());

        return redirect()->route('admin.paramedik.list')->with('success', 'Dokter paramedik created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paramedik = DokterParamedik::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('admin.paramedik.edit', compact('kecamatan','paramedik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paramedik = DokterParamedik::find($id);
        $paramedik->update($request->all());

        return redirect()->route('admin.paramedik.list')->with('success', 'Dokter paramedik updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paramedik = DokterParamedik::find($id);
        $paramedik->delete();

        return redirect()->route('admin.paramedik.list')->with('success', 'Dokter paramedik deleted successfully.');
    }
}

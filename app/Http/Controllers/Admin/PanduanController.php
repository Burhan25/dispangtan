<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panduan;
use Illuminate\Support\Facades\Storage;

class PanduanController extends Controller
{
    public function index()
    {
        $panduans = Panduan::all();
        return view('admin.panduan.index', compact('panduans'));
    }

    public function create()
    {
        return view('admin.panduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('panduans'), $fileName);

        Panduan::create([
            'title' => $request->title,
            'file' => 'panduans/' . $fileName,
        ]);

        return redirect()->route('admin.panduan.list')->with('success', 'Panduan created successfully.');
    }

    public function edit(Panduan $panduan)
    {
        return view('admin.panduan.edit', compact('panduan'));
    }

    public function update(Request $request, Panduan $panduan)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ]);

        $path = $panduan->file;
        if ($request->hasFile('file')) {
            if (file_exists(public_path($panduan->file))) {
                unlink(public_path($panduan->file));
            }
            
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('panduans'), $fileName);
            $path = 'panduans/' . $fileName;
        }

        $panduan->update([
            'title' => $request->title,
            'file' => $path,
        ]);

        return redirect()->route('admin.panduan.list')->with('success', 'Panduan updated successfully.');
    }

    public function destroy(Panduan $panduan)
    {
        if (file_exists(public_path($panduan->file))) {
            unlink(public_path($panduan->file));
        }

        $panduan->delete();
        return redirect()->route('admin.panduan.list')->with('success', 'Panduan deleted successfully.');
    }
}

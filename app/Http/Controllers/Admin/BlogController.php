<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()//Menampilkan
    {
        $blogs = Blog::all();// Mengambil semua data blog dari database
        return view('admin.blog.index', compact('blogs'));// Mengembalikan view 'admin.blog.index' dengan data blog yang diambil
    }

    public function create()
    {
        return view('admin.blog.create');// Mengembalikan view 'admin.blog.create' yang berisi form untuk membuat halaman baru
    }
    

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required', //Validasi field title harus diisi
            'description' => 'required',//Validasi field description harus diisi
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',//Validasi image harus disisi
        ]);
       
        $imagePath = null; // Memeriksa apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) { 
            $imagePath = $request->file('image')->store('images', 'public');// Menyimpan gambar di folder 'images' di storage publik
        }

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.blog.list')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));//mengembalikan view ke admin.blog.show
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        if ($request->hasFile('image')) { // Memeriksa apakah ada file gambar baru yang diunggah
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);// Menghapus gambar lama dari storage
            }
            $imagePath = $request->file('image')->store('images', 'public');// Menyimpan gambar baru di folder 'images' di storage publik
            $blog->update(['image' => $imagePath]);// Mengupdate field 'image' di database dengan path dari gambar yang baru
        }

        $blog->update([
            'title' => $request->title, //update title
            'description' => $request->description, //update deskripsi
        ]);

        return redirect()->route('admin.blog.list')->with('success', 'Blog updated successfully.');// Mengarahkan pengguna kembali ke daftar blog dengan pesan sukses
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) { // Memeriksa apakah blog memiliki gambar yang tersimpan
            Storage::disk('public')->delete($blog->image); // Menghapus gambar dari storage
        }
        $blog->delete();// Menghapus halaman blog dari database
        return redirect()->route('admin.blog.list')->with('success', 'Blog deleted successfully.');//Mengarahkan pengguna kembali pada daftar blog
    }
}



<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return view('galeri.index', compact('galeris'));
    }
    public function create()
    {
        return view('galeri.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $imageName = strtolower(str_replace(' ', '_', $input['judul'])) . '_' . time() . '.' . $gambar->getClientOriginalExtension();
            $filePath = 'images/galeri/' . $imageName;
            $gambar->storeAs('public', $filePath);
            $input['gambar'] = 'storage/' . $filePath;
        } else {
            $input['gambar'] = null;
        }
        Galeri::create($input);
        return redirect()->route('galeris.index')->with('message', 'Galeri berhasil ditambahkan');
    }
    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }
    public function edit(Galeri $galeri)
    {
        return view('galeri.edit', compact('galeri'));
    }
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $imageName = strtolower(str_replace(' ', '_', $input['judul'])) . '_' . time() . '.' . $gambar->getClientOriginalExtension();
            $filePath = 'images/galeri/' . $imageName;
            $gambar->storeAs('public', $filePath);
            $input['gambar'] = 'storage/' . $filePath;
            if ($galeri->gambar && Storage::exists(str_replace('storage/', 'public/', $galeri->gambar))) {
                Storage::delete(str_replace('storage/', 'public/', $galeri->gambar));
            }
        } else {
            $input['gambar'] = $galeri->gambar;
        }
        $galeri->update($input);
        return redirect()->route('galeris.index')->with('message', 'Galeri berhasil diedit');
    }
    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar && Storage::exists(str_replace('storage/', 'public/', $galeri->gambar))) {
            Storage::delete(str_replace('storage/', 'public/', $galeri->gambar));
        }
        $galeri->delete();
        return redirect()->route('galeris.index')->with('message', 'Galeri berhasil dihapus');
    }
}

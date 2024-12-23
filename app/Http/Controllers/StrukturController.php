<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function index()
    {
        $struktur = Struktur::first();
        return view('struktur', compact('struktur'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Struktur $struktur)
    {
        $struktur = Struktur::first();
        return view('home.struktur', compact('struktur'));
    }
    public function edit($id)
    {
        $struktur = Struktur::find($id);
        if (!$struktur) {
            return redirect()->route('struktur.index')->with('error', 'Data tidak ditemukan.');
        }
        return view('struktur.edit', compact('struktur'));
    }
    public function update(Request $request, $id)
    {
        $struktur = Struktur::findOrFail($id);
        $request->validate([
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        if ($request->hasFile('image_path')) {
            if ($struktur->image_path) {
                Storage::delete('public/' . $struktur->image_path);
            }

            $filePath = $request->file('image_path')->store('public/images/struktur');

            $struktur->image_path = str_replace('public/', '', $filePath);
        }

        $struktur->save();

        return redirect()->route('struktur.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Struktur $struktur)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();

        return view('kontak', compact('kontak'));
    }
    public function create()
    {
        return view('kontak.create');
    }
    public function store(Request $request)
    {
        //
    }
    public function show()
    {
        $kontak = Kontak::first();

        if (!$kontak) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('kontak', compact('kontak'));
    }
    public function edit(Kontak $kontak)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'hari_jam_buka' => 'required|string|max:255',
            'maps_url' => 'required|url',
        ]);
        $kontak = Kontak::findOrFail($id);
        $kontak->nama = $request->nama;
        $kontak->alamat = $request->alamat;
        $kontak->telepon = $request->telepon;
        $kontak->email = $request->email;
        $kontak->instagram = $request->instagram;
        $kontak->youtube = $request->youtube;
        $kontak->hari_jam_buka = $request->hari_jam_buka;
        $kontak->maps_url = $request->maps_url;
        $kontak->save();

        return redirect()->route('kontak.index')->with('success', 'Data berhasil diubah.');
    }
    public function destroy(Kontak $kontak)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }
    public function create()
    {
        return view('pegawai.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $imageName = strtolower(str_replace(' ', '_', $input['nama'])) . '_' . time() . '.' . $foto->getClientOriginalExtension();
            $filePath = $foto->storeAs('public/app/images/pegawai', $imageName);
            $input['foto'] = str_replace('public/', '', $filePath);
        } else {
            $input['foto'] = null;
        }

        Pegawai::create($input);

        return redirect()->route('pegawais.index')->with('message', 'Pegawai berhasil ditambahkan');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            if ($pegawai->foto && Storage::exists('public/' . $pegawai->foto)) {
                Storage::delete('public/' . $pegawai->foto);
            }
            $foto = $request->file('foto');
            $imageName = strtolower(str_replace(' ', '_', $input['nama'])) . '_' . time() . '.' . $foto->getClientOriginalExtension();
            $filePath = $foto->storeAs('public/images/pegawai', $imageName);
            $input['foto'] = str_replace('public/', '', $filePath);
        } else {
            $input['foto'] = $pegawai->foto;
        }

        $pegawai->update($input);

        return redirect()->route('pegawais.index')->with('message', 'Pegawai berhasil diedit');
    }

    public function destroy(Pegawai $pegawai)
    {
        // Hapus foto jika ada
        if ($pegawai->foto && Storage::exists('public/' . $pegawai->foto)) {
            Storage::delete('public/' . $pegawai->foto);
        }

        $pegawai->delete();

        return redirect()->route('pegawais.index')->with('message', 'Pegawai berhasil dihapus');
    }
}

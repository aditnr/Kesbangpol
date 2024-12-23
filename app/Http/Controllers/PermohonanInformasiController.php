<?php

namespace App\Http\Controllers;

use App\Models\PermohonanInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PermohonanInformasiController extends Controller
{
    public function index()
    {
        $permohonan_informasis = PermohonanInformasi::all();
        return view('permohonan_informasi.index', compact('permohonan_informasis'));
    }

    public function create()
    {
        return view('permohonan_informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'nim' => 'nullable|string|max:16',
            'perguruan_tinggi' => 'nullable|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'informasi' => 'required|string',
            'ktp' => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Upload KTP jika ada
        if ($request->hasFile('ktp')) {
            $path = $request->file('ktp')->store('ktp', 'public');
        } else {
            $path = null;
        }

        // Simpan data permohonan
        PermohonanInformasi::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nim' => $request->nim,
            'perguruan_tinggi' => $request->perguruan_tinggi,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'informasi' => $request->informasi,
            'ktp' => $path,
        ]);

        return redirect()->route('permohonan_informasi.create')->with('success', 'Permohonan berhasil diajukan.');
    }

    public function edit($id)
    {
        $permohonan_informasi = PermohonanInformasi::findOrFail($id);
        return view('permohonan_informasi.edit', compact('permohonan_informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'nim' => 'nullable|string|max:16',
            'perguruan_tinggi' => 'nullable|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'informasi' => 'required|string',
            'ktp' => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $permohonan_informasi = PermohonanInformasi::findOrFail($id);

        // Upload KTP baru jika ada
        if ($request->hasFile('ktp')) {
            // Hapus file KTP lama
            if ($permohonan_informasi->ktp) {
                Storage::delete('public/' . $permohonan_informasi->ktp);
            }
            $path = $request->file('ktp')->store('ktp', 'public');
        } else {
            $path = $permohonan_informasi->ktp;
        }

        // Update data permohonan
        $permohonan_informasi->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nim' => $request->nim,
            'perguruan_tinggi' => $request->perguruan_tinggi,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'informasi' => $request->informasi,
            'ktp' => $path,
        ]);

        return redirect()->route('permohonan_informasi.index')->with('message', 'Permohonan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $permohonan_informasi = PermohonanInformasi::findOrFail($id);
        // Hapus file KTP jika ada
        if ($permohonan_informasi->ktp) {
            Storage::delete('public/' . $permohonan_informasi->ktp);
        }
        $permohonan_informasi->delete();

        return redirect()->route('permohonan_informasi.index')->with('message', 'Permohonan berhasil dihapus.');
    }
    public function show($id)
    {
        $permohonan_informasi = PermohonanInformasi::findOrFail($id);
        return view('permohonan_informasi.show', compact('permohonan_informasi'));
    }
}

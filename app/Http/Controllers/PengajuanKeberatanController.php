<?php

namespace App\Http\Controllers;

use App\Models\PengajuanKeberatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanKeberatanController extends Controller
{
    public function index()
    {
        $pengajuan_keberatans = PengajuanKeberatan::all();
        return view('pengajuan_keberatan.index', compact('pengajuan_keberatans'));
    }

    public function create()
    {
        return view('pengajuan_keberatan.create');
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
            'pengajuan' => 'required|string',
            'dokumen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Upload dokumen jika ada
        if ($request->hasFile('dokumen')) {
            $path = $request->file('dokumen')->store('dokumen', 'public');
        } else {
            $path = null;
        }

        PengajuanKeberatan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nim' => $request->nim,
            'perguruan_tinggi' => $request->perguruan_tinggi,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'pengajuan' => $request->pengajuan,
            'dokumen' => $path,
        ]);

        return redirect()->route('pengajuan_keberatan.create')->with('success', 'Pengajuan Keberatan berhasil diajukan.');
    }

    public function edit($id)
    {
        $pengajuan_keberatans = PengajuanKeberatan::findOrFail($id);
        return view('pengajuan_keberatan.edit', compact('pengajuan_keberatans'));
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
            'pengajuan' => 'required|string',
            'dokumen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $pengajuan_keberatan = PengajuanKeberatan::findOrFail($id);

        // Upload dokumen baru jika ada
        if ($request->hasFile('dokumen')) {
            // Hapus file dokumen lama
            if ($pengajuan_keberatan->dokumen) {
                Storage::delete('public/' . $pengajuan_keberatan->dokumen);
            }
            $path = $request->file('dokumen')->store('dokumen', 'public');
        } else {
            $path = $pengajuan_keberatan->dokumen;
        }

        // Update data pengajuan_keberatan
        $pengajuan_keberatan->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nim' => $request->nim,
            'perguruan_tinggi' => $request->perguruan_tinggi,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'pengajuan' => $request->pengajuan,
            'dokumen' => $path,
        ]);

        return redirect()->route('pengajuan_keberatan.index')->with('message', 'Pengajuan Keberatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengajuan_keberatan = PengajuanKeberatan::findOrFail($id);
        // Hapus file dokumen jika ada
        if ($pengajuan_keberatan->dokumen) {
            Storage::delete('public/' . $pengajuan_keberatan->dokumen);
        }
        $pengajuan_keberatan->delete();

        return redirect()->route('pengajuan_keberatan.index')->with('message', 'Pengajuan Keberatan berhasil dihapus.');
    }

    public function show($id)
    {
        $pengajuan_keberatan = PengajuanKeberatan::findOrFail($id);
        return view('pengajuan_keberatan.show', compact('pengajuan_keberatan'));
    }
}

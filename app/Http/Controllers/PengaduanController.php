<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduans = Pengaduan::all(); // Or use pagination if the data set is large
        return view('pengaduan.index', compact('pengaduans'));
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah pengaduan
        return view('pengaduan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'alamat_pelapor' => 'required|string',
            'kontak_pelapor' => 'required|string|max:15',
            'email' => 'required|email',
            'judul_pengaduan' => 'required|string|max:255',
            'deskripsi_pengaduan' => 'required|string',
            'kategori_pengaduan' => 'required|string|max:50',
        ]);
    
        // Menyimpan data pengaduan ke database
        Pengaduan::create($validatedData);
    
        // Redirect kembali dengan pesan sukses
        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan Anda telah berhasil dikirim!');
    }
    
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        // Menampilkan detail pengaduan
        return view('pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        // Menampilkan form edit pengaduan
        return view('pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric',
            'email' => 'nullable|email',
            'judul_pengaduan' => 'required|string',
            'deskripsi' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Update data pengaduan
        $pengaduan->update($validated);

        // Menangani file dokumen baru jika ada
        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama jika ada
            if ($pengaduan->dokumen) {
                Storage::delete($pengaduan->dokumen);
            }

            // Simpan dokumen baru
            $path = $request->file('dokumen')->store('dokuments');
            $pengaduan->dokumen = $path;
        }

        // Redirect ke halaman pengaduan setelah update
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        // Hapus dokumen terkait jika ada
        if ($pengaduan->dokumen) {
            Storage::delete($pengaduan->dokumen);
        }

        // Hapus pengaduan
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }

    /**
     * Show the public-facing form for creating a new resource.
     */
}

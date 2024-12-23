<?php

namespace App\Http\Controllers;

use App\Models\InformasiBerkala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InformasiBerkalaController extends Controller
{
// Misalnya di InformasiBerkalaController.php
    public function index()
    {
        
        // Ambil data dari tabel informasi berkala
        $informasi_ikms = DB::table('ikms')
                                ->select('nama', 'tahun', 'file')
                                ->get();
        $informasi_lkips = DB::table('lkips')
                                ->select('nama', 'tahun', 'file')
                                ->get();
        $informasi_renjas = DB::table('renjas')
                                ->select('nama', 'tahun', 'file')
                                ->get();
        $informasi_renstras = DB::table('renstras')
                                ->select('nama', 'tahun', 'file')
                                ->get();
        $informasi_berkalas = $informasi_ikms->concat($informasi_lkips)->concat($informasi_renjas)->concat($informasi_renstras);

        return view('informasi_berkala.index', compact('informasi_berkalas'));
    }
    public function tampilkan()
    {
        // Ambil data dari tabel informasi berkala
        $informasi_ikms = DB::table('ikms')
                                ->select('nama', 'tahun', 'file')
                                ->get();
        $informasi_lkips = DB::table('lkips')
                                ->select('nama', 'tahun', 'file')
                                ->get();
        $informasi_renjas = DB::table('renjas')
                                ->select('nama', 'tahun', 'file')
                                ->get();
        $informasi_renstras = DB::table('renstras')
                                ->select('nama', 'tahun', 'file')
                                ->get();
        $informasi_berkalas = $informasi_ikms->concat($informasi_lkips)->concat($informasi_renjas)->concat($informasi_renstras);

        return view('home.informasi_berkala', compact('informasi_berkalas'));
    }


    public function create()
    {
        return view('informasi_berkala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:20000',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Simpan file
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/dokumen', $fileName);

        InformasiBerkala::create([
            'nama' => $request->nama,
            'file' => Storage::url($filePath), // Simpan path file yang aman
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('informasi_berkalas.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function show(InformasiBerkala $informasi_berkala)
    {
        //
    }

    public function edit($id)
    {
        $informasi_berkala = InformasiBerkala::find($id);

        if (!$informasi_berkala) {
            return redirect()->route('informasi_berkalas.index')->with('error', 'Data tidak ditemukan');
        }

        return view('informasi_berkala.edit', compact('informasi_berkala'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diinput
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:20000',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);
    
        // Cari data yang ingin diupdate
        $informasi_berkala = InformasiBerkala::find($id);
    
        if (!$informasi_berkala) {
            return redirect()->route('informasi_berkalas.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Jika file baru diunggah, proses dan simpan
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (file_exists(storage_path('app/public/' . $informasi_berkala->file))) {
                unlink(storage_path('app/public/' . $informasi_berkala->file));
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file baru
            $file->storeAs('public/dokumen', $fileName); // Simpan ke folder baru
            $informasi_berkala->file = 'storage/dokumen/' . $fileName; // Update path file
        }
    
        // Update field lainnya
        $informasi_berkala->nama = $validatedData['nama'];
        $informasi_berkala->tahun = $validatedData['tahun'];
        $informasi_berkala->save();
    
        // Redirect ke halaman index setelah berhasil update
        return redirect()->route('informasi_berkalas.index')->with('success', 'Data InformasiBerkala berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $informasi_berkala = InformasiBerkala::find($id);

        if (!$informasi_berkala) {
            return redirect()->route('informasi_berkalas.index')->with('error', 'Data tidak ditemukan');
        }

        // Hapus file dari storage jika ada
        if (Storage::exists($informasi_berkala->file)) {
            Storage::delete($informasi_berkala->file);
        }

        $informasi_berkala->delete();

        return redirect()->route('informasi_berkalas.index')->with('success', 'Data InformasiBerkala berhasil dihapus');
    }
}

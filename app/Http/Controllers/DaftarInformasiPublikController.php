<?php

namespace App\Http\Controllers;

use App\Models\DaftarInformasiPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarInformasiPublikController extends Controller
{
    public function index()
    {
        $daftar_informasi_publiks = DaftarInformasiPublik::all();
        return view('daftar_informasi_publik.index', compact('daftar_informasi_publiks'));
    }

    public function create()
    {
        return view('daftar_informasi_publik.create');
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

        DaftarInformasiPublik::create([
            'nama' => $request->nama,
            'file' => Storage::url($filePath), // Simpan path file yang aman
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('daftar_informasi_publiks.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function show(DaftarInformasiPublik $daftar_informasi_publik)
    {
        //
    }

    public function edit($id)
    {
        $daftar_informasi_publik = DaftarInformasiPublik::find($id);

        if (!$daftar_informasi_publik) {
            return redirect()->route('daftar_informasi_publiks.index')->with('error', 'Data tidak ditemukan');
        }

        return view('daftar_informasi_publik.edit', compact('daftar_informasi_publik'));
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
        $daftar_informasi_publik = DaftarInformasiPublik::find($id);
    
        if (!$daftar_informasi_publik) {
            return redirect()->route('daftar_informasi_publiks.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Jika file baru diunggah, proses dan simpan
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (file_exists(storage_path('app/public/' . $daftar_informasi_publik->file))) {
                unlink(storage_path('app/public/' . $daftar_informasi_publik->file));
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file baru
            $file->storeAs('public/dokumen', $fileName); // Simpan ke folder baru
            $daftar_informasi_publik->file = 'storage/dokumen/' . $fileName; // Update path file
        }
    
        // Update field lainnya
        $daftar_informasi_publik->nama = $validatedData['nama'];
        $daftar_informasi_publik->tahun = $validatedData['tahun'];
        $daftar_informasi_publik->save();
    
        // Redirect ke halaman index setelah berhasil update
        return redirect()->route('daftar_informasi_publiks.index')->with('success', 'Data daftar_informasi_publik berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $daftar_informasi_publik = DaftarInformasiPublik::find($id);

        if (!$daftar_informasi_publik) {
            return redirect()->route('daftar_informasi_publiks.index')->with('error', 'Data tidak ditemukan');
        }

        // Hapus file dari storage jika ada
        if (Storage::exists($daftar_informasi_publik->file)) {
            Storage::delete($daftar_informasi_publik->file);
        }

        $daftar_informasi_publik->delete();

        return redirect()->route('daftar_informasi_publiks.index')->with('success', 'Data daftar_informasi_publik berhasil dihapus');
    }
}

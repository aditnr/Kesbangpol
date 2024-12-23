<?php

namespace App\Http\Controllers;

use App\Models\Renja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RenjaController extends Controller
{
    public function index()
    {
        $renjas = Renja::all();
        return view('renja.index', compact('renjas'));
    }

    public function create()
    {
        return view('renja.create');
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

        renja::create([
            'nama' => $request->nama,
            'file' => Storage::url($filePath), // Simpan path file yang aman
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('renjas.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function show(Renja $renja)
    {
        //
    }

    public function edit($id)
    {
        $renja = Renja::find($id);

        if (!$renja) {
            return redirect()->route('renja.index')->with('error', 'Data tidak ditemukan');
        }

        return view('renja.edit', compact('renja'));
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
        $renja = Renja::find($id);
    
        if (!$renja) {
            return redirect()->route('renja.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Jika file baru diunggah, proses dan simpan
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (file_exists(storage_path('app/public/' . $renja->file))) {
                unlink(storage_path('app/public/' . $renja->file));
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file baru
            $file->storeAs('public/dokumen', $fileName); // Simpan ke folder baru
            $renja->file = 'storage/dokumen/' . $fileName; // Update path file
        }
    
        // Update field lainnya
        $renja->nama = $validatedData['nama'];
        $renja->tahun = $validatedData['tahun'];
        $renja->save();
    
        // Redirect ke halaman index setelah berhasil update
        return redirect()->route('renjas.index')->with('success', 'Data Rencana Kerja berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $renja = Renja::find($id);

        if (!$renja) {
            return redirect()->route('renja.index')->with('error', 'Data tidak ditemukan');
        }

        // Hapus file dari storage jika ada
        if (Storage::exists($renja->file)) {
            Storage::delete($renja->file);
        }

        $renja->delete();

        return redirect()->route('renjas.index')->with('success', 'Data Rencana Kerja berhasil dihapus');
    }
}

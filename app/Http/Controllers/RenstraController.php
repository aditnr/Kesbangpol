<?php

namespace App\Http\Controllers;

use App\Models\Renstra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RenstraController extends Controller
{
    public function index()
    {
        $renstras = Renstra::all();
        return view('renstra.index', compact('renstras'));
    }

    public function create()
    {
        return view('renstra.create');
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

        Renstra::create([
            'nama' => $request->nama,
            'file' => Storage::url($filePath), // Simpan path file yang aman
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('renstras.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function show(Renstra $renstra)
    {
        //
    }

    public function edit($id)
    {
        $renstra = Renstra::find($id);

        if (!$renstra) {
            return redirect()->route('renstras.index')->with('error', 'Data tidak ditemukan');
        }

        return view('renstra.edit', compact('renstra'));
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
        $renstra = Renstra::find($id);
    
        if (!$renstra) {
            return redirect()->route('renstras.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Jika file baru diunggah, proses dan simpan
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (file_exists(storage_path('app/public/' . $renstra->file))) {
                unlink(storage_path('app/public/' . $renstra->file));
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file baru
            $file->storeAs('public/dokumen', $fileName); // Simpan ke folder baru
            $renstra->file = 'storage/dokumen/' . $fileName; // Update path file
        }
    
        // Update field lainnya
        $renstra->nama = $validatedData['nama'];
        $renstra->tahun = $validatedData['tahun'];
        $renstra->save();
    
        // Redirect ke halaman index setelah berhasil update
        return redirect()->route('renstras.index')->with('success', 'Data renstra berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $renstra = Renstra::find($id);

        if (!$renstra) {
            return redirect()->route('renstras.index')->with('error', 'Data tidak ditemukan');
        }

        // Hapus file dari storage jika ada
        if (Storage::exists($renstra->file)) {
            Storage::delete($renstra->file);
        }

        $renstra->delete();

        return redirect()->route('renstras.index')->with('success', 'Data renstra berhasil dihapus');
    }
}

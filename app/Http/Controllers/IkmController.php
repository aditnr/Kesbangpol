<?php

namespace App\Http\Controllers;

use App\Models\Ikm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IkmController extends Controller
{
    public function index()
    {
        $ikms = Ikm::all();
        return view('ikm.index', compact('ikms'));
    }

    public function create()
    {
        return view('ikm.create');
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

        Ikm::create([
            'nama' => $request->nama,
            'file' => Storage::url($filePath), // Simpan path file yang aman
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('ikms.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function show(Ikm $ikm)
    {
        //
    }

    public function edit($id)
    {
        $ikm = Ikm::find($id);

        if (!$ikm) {
            return redirect()->route('ikms.index')->with('error', 'Data tidak ditemukan');
        }

        return view('ikm.edit', compact('ikm'));
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
        $ikm = Ikm::find($id);
    
        if (!$ikm) {
            return redirect()->route('ikms.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Jika file baru diunggah, proses dan simpan
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (file_exists(storage_path('app/public/' . $ikm->file))) {
                unlink(storage_path('app/public/' . $ikm->file));
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file baru
            $file->storeAs('public/dokumen', $fileName); // Simpan ke folder baru
            $ikm->file = 'storage/dokumen/' . $fileName; // Update path file
        }
    
        // Update field lainnya
        $ikm->nama = $validatedData['nama'];
        $ikm->tahun = $validatedData['tahun'];
        $ikm->save();
    
        // Redirect ke halaman index setelah berhasil update
        return redirect()->route('ikms.index')->with('success', 'Data IKM berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $ikm = Ikm::find($id);

        if (!$ikm) {
            return redirect()->route('ikms.index')->with('error', 'Data tidak ditemukan');
        }

        // Hapus file dari storage jika ada
        if (Storage::exists($ikm->file)) {
            Storage::delete($ikm->file);
        }

        $ikm->delete();

        return redirect()->route('ikms.index')->with('success', 'Data IKM berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\InformasiDikecualikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiDikecualikanController extends Controller
{
    public function index()
    {
        $informasi_dikecualikans = InformasiDikecualikan::all();
        return view('informasi_dikecualikan.index', compact('informasi_dikecualikans'));
    }

    public function create()
    {
        return view('informasi_dikecualikan.create');
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

        InformasiDikecualikan::create([
            'nama' => $request->nama,
            'file' => Storage::url($filePath), // Simpan path file yang aman
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('informasi_dikecualikans.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function show(InformasiDikecualikan $informasi_dikecualikan)
    {
        //
    }

    public function edit($id)
    {
        $informasi_dikecualikan = InformasiDikecualikan::find($id);

        if (!$informasi_dikecualikan) {
            return redirect()->route('informasi_dikecualikans.index')->with('error', 'Data tidak ditemukan');
        }

        return view('informasi_dikecualikan.edit', compact('informasi_dikecualikan'));
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
        $informasi_dikecualikan = InformasiDikecualikan::find($id);
    
        if (!$informasi_dikecualikan) {
            return redirect()->route('informasi_dikecualikans.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Jika file baru diunggah, proses dan simpan
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (file_exists(storage_path('app/public/' . $informasi_dikecualikan->file))) {
                unlink(storage_path('app/public/' . $informasi_dikecualikan->file));
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file baru
            $file->storeAs('public/dokumen/', $fileName); // Simpan ke folder baru
            $informasi_dikecualikan->file = 'storage/dokumen/' . $fileName; // Update path file
        }
    
        // Update field lainnya
        $informasi_dikecualikan->nama = $validatedData['nama'];
        $informasi_dikecualikan->tahun = $validatedData['tahun'];
        $informasi_dikecualikan->save();
    
        // Redirect ke halaman index setelah berhasil update
        return redirect()->route('informasi_dikecualikans.index')->with('success', 'Data InformasiDikecualikan berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $informasi_dikecualikan = InformasiDikecualikan::find($id);

        if (!$informasi_dikecualikan) {
            return redirect()->route('informasi_dikecualikans.index')->with('error', 'Data tidak ditemukan');
        }

        // Hapus file dari storage jika ada
        if (Storage::exists($informasi_dikecualikan->file)) {
            Storage::delete($informasi_dikecualikan->file);
        }

        $informasi_dikecualikan->delete();

        return redirect()->route('informasi_dikecualikans.index')->with('success', 'Data InformasiDikecualikan berhasil dihapus');
    }
}

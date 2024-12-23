<?php

namespace App\Http\Controllers;

use App\Models\Lkip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LkipController extends Controller
{
    public function index()
    {
        $lkips = Lkip::all();
        return view('lkip.index', compact('lkips'));
    }

    public function create()
    {
        return view('lkip.create');
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

        Lkip::create([
            'nama' => $request->nama,
            'file' => Storage::url($filePath), // Simpan path file yang aman
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('lkips.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function show(Lkip $lkip)
    {
        //
    }

    public function edit($id)
    {
        $lkip = Lkip::find($id);

        if (!$lkip) {
            return redirect()->route('lkips.index')->with('error', 'Data tidak ditemukan');
        }

        return view('lkip.edit', compact('lkip'));
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
        $lkip = Lkip::find($id);
    
        if (!$lkip) {
            return redirect()->route('lkips.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Jika file baru diunggah, proses dan simpan
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (file_exists(storage_path('app/public/' . $lkip->file))) {
                unlink(storage_path('app/public/' . $lkip->file));
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file baru
            $file->storeAs('public/dokumen', $fileName); // Simpan ke folder baru
            $lkip->file = 'storage/dokumen/' . $fileName; // Update path file
        }
    
        // Update field lainnya
        $lkip->nama = $validatedData['nama'];
        $lkip->tahun = $validatedData['tahun'];
        $lkip->save();
    
        // Redirect ke halaman index setelah berhasil update
        return redirect()->route('lkips.index')->with('success', 'Data LKIP berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $lkip = Lkip::find($id);

        if (!$lkip) {
            return redirect()->route('lkips.index')->with('error', 'Data tidak ditemukan');
        }

        // Hapus file dari storage jika ada
        if (Storage::exists($lkip->file)) {
            Storage::delete($lkip->file);
        }

        $lkip->delete();

        return redirect()->route('lkips.index')->with('success', 'Data LKIP berhasil dihapus');
    }
}

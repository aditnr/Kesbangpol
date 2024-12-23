<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tentang = Tentang::first();

        return view('tentang', compact('tentang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tentang $tentang)
    {
        $tentang = Tentang::first();

        return view('home.tentang', compact('tentang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $tentang = Tentang::first(); // Ambil data pertama dari tabel Tentang

        return view('tentang', compact('tentang')); // Arahkan ke view tentang.blade.php
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tentang = Tentang::find($id);
        $tentang->judul = $request->input('judul');
        $tentang->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image'), $filename);
            $tentang->logo = $filename;
        }

        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'Data berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tentang $tentang)
    {
        //
    }
}

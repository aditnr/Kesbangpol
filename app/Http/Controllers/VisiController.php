<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visi;

class VisiController extends Controller
{
    public function index()
    {
        $visi = Visi::first();
        return view('visi', compact('visi'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Visi $visi)
    {
        //
    }
    public function edit(Visi $visi)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $visi = Visi::findOrFail($id);
        $visi->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('visi.index')->with('success', 'Data berhasil diperbarui.');
    }
    public function destroy(Visi $visi)
    {
        //
    }
}

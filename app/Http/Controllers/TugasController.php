<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::first();
        return view('tugas', compact('tugas'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Tugas $tugas)
    {
        //
    }
    public function edit(Tugas $tugas)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|string|max:2000',
            'fungsi' => 'required|string|max:2000',
        ]);
        $tugas = Tugas::find($id);
        $tugas->tugas = $request->input('tugas');
        $tugas->fungsi = $request->input('fungsi');
        $tugas->save();
        return redirect()->route('tugas.index')->with('success', 'Data berhasil diperbarui.');
    }
    public function destroy(Tugas $tugas)
    {
        //
    }
}

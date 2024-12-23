<?php
namespace App\Http\Controllers;

use App\Models\Ormas;
use Illuminate\Http\Request;

class OrmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ormass = Ormas::all();
        return view('ormas.index', compact('ormass'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ormas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tahun' => 'required|integer', // Validating 'tahun'
        ]);

        $ormas = new Ormas();
        $ormas->nama = $request->nama;
        $ormas->alamat = $request->alamat;
        $ormas->tahun = $request->tahun; // Storing 'tahun'
        
        $ormas->save();

        return redirect()->route('ormass.index')->with('message', 'Ormas berhasil ditambahkan.');
    }
    /**
     * Show the specified resource.
     */
    public function show(Ormas $ormas)
    {
        return view('ormas.show', compact('ormas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ormas_id)
    {
        $ormas = Ormas::find($ormas_id);
        return view('ormas.edit', compact('ormas'));
    }

    /**
     * Update the specified resource in storage.
     */
// Store Method


    // Update Method
    public function update(Request $request, $ormas_id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tahun' => 'required|integer',
        ]);

        $input = $request->all();
        $ormas = Ormas::find($ormas_id);
        $ormas->update($input);

        return redirect()->route('ormass.index')->with('message', 'Ormas berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ormas_id)
    {
        $ormas = Ormas::find($ormas_id);
        $ormas->delete();
        return redirect('/ormass')->with('message', 'Ormas berhasil dihapus');
    }

}

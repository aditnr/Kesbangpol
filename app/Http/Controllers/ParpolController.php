<?php

namespace App\Http\Controllers;

use App\Models\Parpol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParpolController extends Controller
{
    public function index()
    {
        $parpols = Parpol::all();
        return view('parpol.index', compact('parpols'));
    }
    public function create()
    {
        return view('parpol.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'partai' => 'required',
            'ketua' => 'required',
            'alamat' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $imageName = strtolower(str_replace(' ', '_', $input['partai'])) . '_' . time() . '.' . $logo->getClientOriginalExtension();
            $filePath = $logo->storeAs('public/app/images/parpol', $imageName);
            $input['logo'] = str_replace('public/', '', $filePath);
        } else {
            $input['logo'] = null;
        }

        Parpol::create($input);

        return redirect()->route('parpols.index')->with('message', 'Parpol berhasil ditambahkan');
    }

    public function show(Parpol $parpol)
    {
        return view('parpol.show', compact('parpol'));
    }
    public function edit(Parpol $parpol)
    {
        return view('parpol.edit', compact('parpol'));
    }
    public function update(Request $request, Parpol $parpol)
    {
        $request->validate([
            'partai' => 'required',
            'ketua' => 'required',
            'alamat' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('logo')) {
            if ($parpol->logo && Storage::exists('public/' . $parpol->logo)) {
                Storage::delete('public/' . $parpol->logo);
            }
            $logo = $request->file('logo');
            $imageName = strtolower(str_replace(' ', '_', $input['partai'])) . '_' . time() . '.' . $logo->getClientOriginalExtension();
            $filePath = $logo->storeAs('public/images/parpol', $imageName);
            $input['logo'] = str_replace('public/', '', $filePath);
        } else {
            $input['logo'] = $parpol->logo;
        }

        $parpol->update($input);

        return redirect()->route('parpols.index')->with('message', 'Parpol berhasil diedit');
    }

    public function destroy(Parpol $parpol)
    {
        // Hapus logo jika ada
        if ($parpol->logo && Storage::exists('public/' . $parpol->logo)) {
            Storage::delete('public/' . $parpol->logo);
        }

        $parpol->delete();

        return redirect()->route('parpols.index')->with('message', 'Parpol berhasil dihapus');
    }
}

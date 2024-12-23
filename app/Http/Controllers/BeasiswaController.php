<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('beasiswa.index', compact('beasiswas'));
    }

    public function create()
    {
        return view('beasiswa.create');
    }

    public function store(Request $request)
    {
        Beasiswa::create($request->all());
        return redirect()->route('beasiswa.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit($beasiswaID)
    {
        $beasiswa = Beasiswa::find($beasiswaID);
        return view('beasiswa.edit', compact('beasiswa'));
    }

    public function update(Request $request, $beasiswaID)
    {
        $beasiswa = Beasiswa::find($beasiswaID);
        $beasiswa->update($request->all());
        return redirect()->route('beasiswa.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy($beasiswaID)
    {
        Beasiswa::destroy($beasiswaID);
        return redirect()->route('beasiswa.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}

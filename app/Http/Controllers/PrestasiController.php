<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    // Index method to display all records
    public function index()
    {
        $prestasis = Prestasi::all();
        return view('prestasi.index', compact('prestasis'));
    }

    // Create method to show the creation form
    public function create()
    {
        return view('prestasi.create');
    }

    // Store method to save new record
    public function store(Request $request)
    {
        $request->validate([
            'bidang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keteranganPrestasi' => 'required|string|max:1000',
        ]);

        Prestasi::create($request->all());

        return redirect()->route('prestasi.index')
                         ->with('success', 'Prestasi berhasil ditambahkan.');
    }

    // Edit method to show the edit form
    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasi.edit', compact('prestasi'));
    }

    // Update method to save changes
    public function update(Request $request, $id)
    {
        $request->validate([
            'bidang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keteranganPrestasi' => 'required|string|max:1000',
        ]);

        $prestasi = Prestasi::findOrFail($id);
        $prestasi->update($request->all());

        return redirect()->route('prestasi.index')
                         ->with('success', 'Prestasi berhasil diperbarui.');
    }

    // Delete method to remove a record
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->delete();

        return redirect()->route('prestasi.index')
                         ->with('success', 'Prestasi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index($SiswasiswaID)
    {
        $siswa = Siswa::findOrFail($SiswasiswaID);
        $beasiswa = Beasiswa::where('SiswasiswaID', $SiswasiswaID)->get();
        return view('siswa.edit.beasiswa.index', compact('beasiswa', 'SiswasiswaID','siswa'));
    }

    public function create($SiswasiswaID)
    {
        $siswa = Siswa::findOrFail($SiswasiswaID);
        return view('siswa.edit.beasiswa.create', compact('SiswasiswaID', 'siswa'));
    }

    public function store(Request $request, $SiswasiswaID)
    {
        $request->validate([
            'penyelenggara' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'tahun' => 'required|max:10',
        ]);

        Beasiswa::create([
            'SiswasiswaID' => $SiswasiswaID,
            'penyelenggara' => $request->penyelenggara,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('siswa.beasiswa.index', $SiswasiswaID)
                        ->with('success', 'Beasiswa created successfully.');
    }

    public function edit($SiswasiswaID, $beasiswaID)
    {
        $siswa = Siswa::findOrFail($SiswasiswaID);
        $beasiswa = Beasiswa::where('beasiswaID', $beasiswaID)
                            ->where('SiswasiswaID', $SiswasiswaID)
                            ->firstOrFail();

        return view('siswa.edit.beasiswa.edit', compact('beasiswa', 'SiswasiswaID','siswa'));
    }

    public function update(Request $request, $SiswasiswaID, $beasiswaID)
    {
        $request->validate([
            'penyelenggara' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'tahun' => 'required|max:10',
        ]);

        $beasiswa = Beasiswa::where('beasiswaID', $beasiswaID)
                            ->where('SiswasiswaID', $SiswasiswaID)
                            ->firstOrFail();

        $beasiswa->update([
            'penyelenggara' => $request->penyelenggara,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('siswa.beasiswa.index', $SiswasiswaID)
                        ->with('success', 'Beasiswa updated successfully.');
    }

    public function destroy($SiswasiswaID, $beasiswaID)
    {
        $beasiswa = Beasiswa::where('beasiswaID', $beasiswaID)
                            ->where('SiswasiswaID', $SiswasiswaID)
                            ->firstOrFail();

        $beasiswa->delete();

        return redirect()->route('siswa.beasiswa.index', $SiswasiswaID)
                        ->with('success', 'Beasiswa deleted successfully.');
    }
}

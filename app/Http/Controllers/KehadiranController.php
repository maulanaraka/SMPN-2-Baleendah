<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $kehadiran = Kehadiran::where('SiswasiswaID', $siswaID)->get();
        $siswaKelas = SiswaKelas::where('SiswasiswaID', $siswaID)->get();
        $siswaKelas = $siswaKelas->sortBy(function($kelas) {
            return $kelas->kelas->kelasID ?? ''; // Sorting by kelasID
        });
        return view('siswa.edit.kehadiran.index', compact('siswa', 'kehadiran', 'siswaKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($siswaID)
    {
        return view('siswa.edit.kehadiran.create', compact('siswaID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $siswaID)
    {
        $request->validate([
            'jumlahHadir' => 'required|integer',
            'presentaseHadir' => 'required|numeric',
            'sakit' => 'required|integer',
            'izin' => 'required|integer',
            'alpa' => 'required|integer',
            'presentaseTidakHadir' => 'required|numeric',
            'jumlahHariBelajarEfektif' => 'required|integer',
        ]);

        Kehadiran::create([
            'SiswasiswaID' => $siswaID,
            ...$request->all(),
        ]);

        return redirect()->route('kehadiran.index', $siswaID)->with('success', 'Kehadiran created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($siswaID, $kehadiranID)
    {
        $kehadiran = Kehadiran::findOrFail($kehadiranID);
        return view('siswa.edit.kehadiran.edit', compact('kehadiran', 'siswaID'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $siswaID, $kehadiranID)
    {
        $request->validate([
            'jumlahHadir' => 'required|integer',
            'presentaseHadir' => 'required|numeric',
            'sakit' => 'required|integer',
            'izin' => 'required|integer',
            'alpa' => 'required|integer',
            'presentaseTidakHadir' => 'required|numeric',
            'jumlahHariBelajarEfektif' => 'required|integer',
        ]);

        $kehadiran = Kehadiran::findOrFail($kehadiranID);
        $kehadiran->update($request->all());

        return redirect()->route('kehadiran.index', $siswaID)->with('success', 'Kehadiran updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($siswaID, $kehadiranID)
    {
        $kehadiran = Kehadiran::findOrFail($kehadiranID);
        return view('siswa.edit.kehadiran.show', compact('kehadiran', 'siswaID'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($siswaID, $kehadiranID)
    {
        $kehadiran = Kehadiran::findOrFail($kehadiranID);
        $kehadiran->delete();

        return redirect()->route('kehadiran.index', $siswaID)->with('success', 'Kehadiran deleted successfully.');
    }
}


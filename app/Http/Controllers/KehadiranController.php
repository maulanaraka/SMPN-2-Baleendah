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
        // Retrieve the siswa record
    $siswa = Siswa::findOrFail($siswaID);
    
    // Get all siswaKelas related to the siswa
    $siswaKelas = SiswaKelas::where('SiswasiswaID', $siswaID)->get();
    
    // Get all kehadiran records and group them by siswa_kelassiswaKelasID
    $kehadiran = Kehadiran::whereIn('siswa_kelassiswaKelasID', $siswaKelas->pluck('siswaKelasID'))->get();
    
    // Pass the data to the view
    return view('siswa.edit.kehadiran.index', compact('siswa', 'siswaKelas', 'kehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $kehadiran = new Kehadiran();
        return view('siswa.edit.kehadiran.create', compact('siswa', 'kehadiran', 'siswaID'));
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

        return redirect()->route('siswa.kehadiran.index', $siswaID)->with('success', 'Kehadiran created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($siswaID, $kehadiranID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $kehadiran = Kehadiran::findOrFail($kehadiranID);
        return view('siswa.edit.kehadiran.edit', compact('kehadiran', 'siswaID', 'siswa'));
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

        return redirect()->route('siswa.kehadiran.index', $siswaID)->with('success', 'Kehadiran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($siswaID, $kehadiranID)
    {
        $kehadiran = Kehadiran::findOrFail($kehadiranID);
        $kehadiran->delete();

        return back()->with('success', 'Kehadiran deleted successfully.');
    }
}


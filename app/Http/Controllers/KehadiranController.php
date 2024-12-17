<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kehadiran = Kehadiran::all(); // Fetch all attendance records
        return view('kehadiran.index', compact('kehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kehadiran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'SiswasiswaID' => 'required|string|max:50',
            // 'kelas' => 'required|string|max:10',
            // 'semester' => 'required|integer',
            'jumlahHadir' => 'required|integer',
            'presentaseHadir' => 'required|numeric',
            'sakit' => 'required|integer',
            'izin' => 'required|integer',
            'alpa' => 'required|integer',
            'presentaseTidakHadir' => 'required|numeric',
            'jumlahHariBelajarEfektif' => 'required|integer',
        ]);

        // Create Kehadiran record
        Kehadiran::create($request->all());

        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID); // Ensure the siswa exists
        $kehadiran = Kehadiran::where('SiswasiswaID', $siswaID)->firstOrFail(); // Find the kehadiran data for this siswa
    
        return view('siswa.edit.kehadiran', compact('siswa','kehadiran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $siswaID)
    {
        $request->validate([
            // 'SiswasiswaID' => 'required|string|max:50',
            // 'kelas' => 'required|string|max:10',
            // 'semester' => 'required|integer',
            'jumlahHadir' => 'required|integer',
            'presentaseHadir' => 'required|numeric',
            'sakit' => 'required|integer',
            'izin' => 'required|integer',
            'alpa' => 'required|integer',
            'presentaseTidakHadir' => 'required|numeric',
            'jumlahHariBelajarEfektif' => 'required|integer',
        ]);

        // Find and update Kehadiran record
        $kehadiran = Kehadiran::where('SiswasiswaID', $siswaID)->firstOrFail();
        $kehadiran->update($request->all());

        return back()->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kehadiran $kehadiran)
    {
        $kehadiran->delete();
        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran deleted successfully.');
    }
}

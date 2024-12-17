<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;

class SiswaKelasController extends Controller
{
    // Display the list of classes for a student
    
    public function editKelasIndex($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswaKelas = SiswaKelas::where('SiswasiswaID', $siswaID)->get();
        $siswaKelas = $siswaKelas->sortBy(function($kelas) {
            return $kelas->kelas->kelasID ?? ''; // Sorting by kelasID
        });

        return view('siswa.edit.kelas.index', compact('siswa', 'siswaKelas'));
    }

    // Show the form for editing a specific class of a student
    public function editKelas($siswaID, $siswaKelasID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $kelasData = SiswaKelas::findOrFail($siswaKelasID);
        $kelasList = Kelas::all(); // Fetch all available classes

        return view('siswa.edit.kelas.edit', compact('siswa', 'kelasData', 'kelasList'));
    }

    public function createKelas($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $kelasList = Kelas::all(); // List all available classes
        return view('siswa.edit.kelas.create', compact('siswa', 'kelasList'));
    }

    // Store a new class assignment for a student
    public function storeKelas(Request $request, $siswaID)
    {
        $request->validate([
            'KelaskelasID' => 'required|exists:kelas,kelasID',
            'TahunAjaran' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
            'tanggalMasuk' => 'required|date', // Validate the tanggalMasuk field
            'tanggalKeluar' => 'nullable|date', // Make tanggalKeluar nullable and validate as date if provided
            'alasanPindah' => 'nullable|string', // Make alasanPindah nullable and validate as string if provided
        ]);

        SiswaKelas::create([
            'SiswasiswaID' => $siswaID,
            'KelaskelasID' => $request->KelaskelasID,
            'TahunAjaran' => $request->TahunAjaran,
            'status' => $request->status,
            'tanggalMasuk' => $request->tanggalMasuk, // Store tanggalMasuk as it's required
            'tanggalKeluar' => $request->tanggalKeluar, // Store tanggalKeluar if provided, else null
            'alasanPindah' => $request->alasanPindah, // Store alasanPindah if provided, else null
        ]);

        return redirect()->route('siswa.kelas.index', $siswaID)
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    // Update an existing class assignment for a student
    public function updateKelas(Request $request, $siswaID, $siswaKelasID)
    {
        $request->validate([
            'KelaskelasID' => 'required|exists:kelas,kelasID',
            'TahunAjaran' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);
    
        $siswaKelas = SiswaKelas::findOrFail($siswaKelasID);
        $siswaKelas->update([
            'KelaskelasID' => $request->KelaskelasID,
            'TahunAjaran' => $request->TahunAjaran,
            'status' => $request->status,
        ]);
    
        return redirect()->route('siswa.kelas.index', $siswaID)->with('success', 'Kelas berhasil diperbarui.');
    }    

    // Delete a class assignment for a student
    public function destroyKelas($siswaID, $siswaKelasID)
    {
        $siswaKelas = SiswaKelas::findOrFail($siswaKelasID);
        $siswaKelas->delete();

        return redirect()->route('siswa.kelas.index', $siswaID)
            ->with('success', 'Kelas berhasil dihapus.');
    }
}

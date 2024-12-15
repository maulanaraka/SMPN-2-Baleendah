<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wali;
use App\Models\Siswa;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $siswaId)
    {
        $siswa = Siswa::findOrFail($siswaId);
        $wali = Wali::where('SiswasiswaID', $siswaId)->first();

        return view('siswa.edit.wali', compact('siswa', 'wali'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $siswaId)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'namaWali' => 'nullable|string|max:255',
            'nomorTeleponWali' => 'nullable|string|max:25',
            'tempatLahirWali' => 'nullable|string|max:50',
            'tanggalLahirWali' => 'nullable|date',
            'kewarganegaraanWali' => 'nullable|string|max:50',
            'pendidikanTertinggiWali' => 'nullable|string|max:25',
            'pekerjaanWali' => 'nullable|string|max:50',
            'penghasilanWali' => 'nullable|numeric',
            'alamatWali' => 'nullable|string|max:255',
            'hubunganDenganSiswa' => 'nullable|string|max:50',
        ]);

        // Check if all fields are empty
        if (array_filter($validated)) {
            // Ensure the Siswa exists
            $siswa = Siswa::findOrFail($siswaId);

            // Try to find the existing Wali record
            $wali = Wali::where('SiswasiswaID', $siswaId)->first();

            if ($wali) {
                // Update the existing Wali record
                $wali->update($validated);
            } else {
                // Create a new Wali record if it doesn't exist
                $validated['SiswasiswaID'] = $siswaId;
                Wali::create($validated);
            }

            return redirect()->route('wali.edit', $siswaId)->with('success', 'Data Wali berhasil diperbarui');
        }

        // If all fields are empty, redirect with no changes
        return redirect()->route('wali.edit', $siswaId)->with('success', 'Tidak ada perubahan pada Data Wali');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

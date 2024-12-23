<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kesehatan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    public function show($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $kesehatan = Kesehatan::where('SiswasiswaID', $siswaID)->first(); // Fetch related health data

        return view('siswa.edit.kesehatan', compact('siswa', 'kesehatan')); // Replace 'kesehatan.show' with your actual view name
    }
    

    public function create(Request $request)
    {
        $siswaID = $request->query('siswaID');

        if (!$siswaID) {
            return redirect()->route('tempat_tinggal.input')->with('error', 'SiswaID tidak ditemukan.');
        }

        $kesehatan = new Kesehatan();
        return view('siswa.input.kesehatan', compact('siswaID', 'kesehatan'));
        }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'SiswasiswaID' => 'required|string|exists:siswa,siswaID',
            'beratDiterima' => 'required|numeric',
            'tinggiDiterima' => 'required|numeric',
            'golDarah' => 'required|string|max:10',
            'penyakitKhusus' => 'nullable|string|max:255',
        ]);

        Kesehatan::create($validatedData);

        return redirect()->route('orang_tua.input', ['siswaID' => $validatedData['SiswasiswaID']])->with('success', 'Data kesehatan berhasil disimpan! Silakan tambahkan data orang tua.');
    }

    public function edit($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID); // Ensure the siswa exists
        $kesehatan = Kesehatan::where('SiswasiswaID', $siswaID)->firstOrFail(); // Find the kesehatan data for this siswa
    
        return view('siswa.edit.kesehatan', compact('siswa', 'kesehatan'));
    }
    

    public function update(Request $request, $siswaID)
    {
        // Validate input fields
        $validatedData = $request->validate([
            'beratDiterima' => 'required|numeric',
            'tinggiDiterima' => 'required|numeric',
            'golDarah' => 'required|string|max:10',
            'penyakitKhusus' => 'nullable|string|max:255', // Allow null for penyakitKhusus
            'beratLulus' => 'nullable|numeric', // Allow null for beratLulus
            'tinggiLulus' => 'nullable|numeric', // Allow null for tinggiLulus
        ]);
    
        // Find the kesehatan record by siswaID
        $kesehatan = Kesehatan::where('SiswasiswaID', $siswaID)->firstOrFail();
    
        // Update the fields with proper null handling for optional fields
        $kesehatan->beratDiterima = $validatedData['beratDiterima'];
        $kesehatan->tinggiDiterima = $validatedData['tinggiDiterima'];
        $kesehatan->golDarah = $validatedData['golDarah'];
        $kesehatan->penyakitKhusus = $request->penyakitKhusus ?: null; // If empty, set to null
        $kesehatan->beratLulus = $request->beratLulus ?: null; // If empty, set to null
        $kesehatan->tinggiLulus = $request->tinggiLulus ?: null; // If empty, set to null
    
        // Save the updated record
        $kesehatan->save();
    
        // Redirect back with success message
        return back()->with('success', 'Data berhasil diperbarui!');
    }
    



}

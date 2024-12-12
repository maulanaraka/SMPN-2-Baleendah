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
    

    public function create()
    {
        return view('siswa.input.kesehatan');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'SiswasiswaID' => 'required|exists:siswa,siswaID',
            'beratDiterima' => 'required|numeric',
            'tinggiDiterima' => 'required|numeric',
            'golDarah' => 'required|string|max:10',
            'penyakitKhusus' => 'nullable|string|max:255',
        ]);

        Kesehatan::create($validatedData);

        return redirect()->route('kesehatan.create')->with('success', 'Data berhasil ditambahkan.');
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TempatTinggal;
use App\Models\Siswa;
use Illuminate\Http\Request;

class TempatTinggalController extends Controller
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
    public function create(Request $request)
    {
        // Ambil SiswaID dari URL
        $siswaID = $request->query('siswaID');

        // Pastikan SiswaID tidak null
        if (!$siswaID) {
            return redirect()->route('siswa.input')->with('error', 'SiswaID tidak ditemukan.');
        }
        
        $tempatTinggal = new TempatTinggal();
        return view('siswa.input.tempat_tinggal', compact('siswaID', 'tempatTinggal')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jalan' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kodePos' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'tinggalBersama' => 'required|string|max:100',
            'jarakKeSekolah' => 'required|numeric|min:1|max:20',
            'kendaraan' => 'required|string|max:100',
            'SiswasiswaID' => 'required|string|exists:siswa,siswaID',
        ]);

        TempatTinggal::create($validatedData);

        return redirect()->route('kesehatan.input', ['siswaID' => $validatedData['SiswasiswaID']])->with('success', 'Data tempat tinggal berhasil disimpan! Silakan tambahkan data kesehatan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $tempatTinggal = TempatTinggal::where('SiswasiswaID', $siswaID)->first(); // Fetch related health data

        return view('siswa.tempat_tinggal', compact('siswa', 'tempatTinggal')); // Replace 'kesehatan.show' with your actual view name
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID); // Ensure the siswa exists
        $tempatTinggal = TempatTinggal::where('SiswasiswaID', $siswaID)->firstOrFail(); // Find the kesehatan data for this siswa

        return view('siswa.edit.tempat_tinggal', compact('siswa', 'tempatTinggal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $siswaID)
    {
        $request->validate([
            'jalan' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kodePos' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'tinggalBersama' => 'required|string|max:100',
            'jarakKeSekolah' => 'required|numeric|min:1|max:20',
            'kendaraan' => 'required|string|max:100',
        ]);

        $tempatTinggal = TempatTinggal::findOrFail($siswaID);
        $tempatTinggal->update($request->all());

        return back()->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrangTua;
use App\Models\Siswa;

class OrangTuaController extends Controller
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
        $siswaID = $request->query('siswaID');

        if (!$siswaID) {
            return redirect()->route('kesehatan.input')->with('error', 'SiswaID tidak ditemukan.');
        }

        $orangTua = new OrangTua();
        return view('siswa.input.orang_tua', compact('siswaID', 'orangTua'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'SiswasiswaID' => 'required|string|exists:siswa,siswaID',
            'namaIbu' => 'required|string|max:255',
            'nomorTeleponIbu' => 'required|string|max:25',
            'tempatLahirIbu' => 'required|string|max:50',
            'tanggalLahirIbu' => 'required|date',
            'kewarganegaraanIbu' => 'required|string|max:50',
            'pendidikanTertinggiIbu' => 'required|string|max:25',
            'pekerjaanIbu' => 'required|string|max:50',
            'penghasilanIbu' => 'required|numeric',
            'alamatIbu' => 'required|string|max:255',
            'namaAyah' => 'required|string|max:255',
            'nomorTeleponAyah' => 'required|string|max:25',
            'tempatLahirAyah' => 'required|string|max:50',
            'tanggalLahirAyah' => 'required|date',
            'kewarganegaraanAyah' => 'required|string|max:50',
            'pendidikanTertinggiAyah' => 'required|string|max:25',
            'pekerjaanAyah' => 'required|string|max:50',
            'penghasilanAyah' => 'required|numeric',
            'alamatAyah' => 'required|string|max:255',
        ]);

        OrangTua::create($validatedData);

        return redirect()->route('wali.input', ['siswaID' => $validatedData['SiswasiswaID']])->with('success', 'Data orang tua berhasil disimpan! Silakan tambahkan data wali.');
    }

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
        $orangTua = OrangTua::where('SiswasiswaID', $siswaId)->firstOrFail();

        return view('siswa.edit.orang_tua', compact('siswa', 'orangTua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $siswaId)
    {
        $request->validate([
            'namaIbu' => 'required|string|max:255',
            'nomorTeleponIbu' => 'required|string|max:25',
            'tempatLahirIbu' => 'required|string|max:50',
            'tanggalLahirIbu' => 'required|date',
            'kewarganegaraanIbu' => 'required|string|max:50',
            'pendidikanTertinggiIbu' => 'required|string|max:25',
            'pekerjaanIbu' => 'required|string|max:50',
            'penghasilanIbu' => 'required|numeric',
            'alamatIbu' => 'required|string|max:255',
            'namaAyah' => 'required|string|max:255',
            'nomorTeleponAyah' => 'required|string|max:25',
            'tempatLahirAyah' => 'required|string|max:50',
            'tanggalLahirAyah' => 'required|date',
            'kewarganegaraanAyah' => 'required|string|max:50',
            'pendidikanTertinggiAyah' => 'required|string|max:25',
            'pekerjaanAyah' => 'required|string|max:50',
            'penghasilanAyah' => 'required|numeric',
            'alamatAyah' => 'required|string|max:255',
        ]);

        $orangTua = OrangTua::where('SiswasiswaID', $siswaId)->firstOrFail();
        $orangTua->update($request->all());

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

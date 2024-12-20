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
    public function create()
    {
        $siswa = new Siswa();
        $orangTua = new OrangTua();
        return view('siswa.input.orang_tua', compact('siswa', 'orangTua'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        OrangTua::create($validatedData);

        return redirect()->route('orang_tua.input')->with('success', 'Data Orang Tua berhasil ditambahkan.');
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

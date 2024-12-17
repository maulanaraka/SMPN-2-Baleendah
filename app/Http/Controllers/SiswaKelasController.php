<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SiswaKelas;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaKelasController extends Controller
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
    public function edit($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswaKelas = SiswaKelas::where('SiswasiswaID', $siswaID)->first();
        $allKelas = Kelas::all(); // Fetch all kelas options

        if (!$siswaKelas) {
            return back()->withErrors('Data siswa kelas tidak ditemukan.');
        }

        return view('siswa.edit.kelas', compact('siswa', 'siswaKelas', 'allKelas'));
    }

    public function update(Request $request, $siswaID)
    {
        $data = $request->validate([
            'kelas' => 'required|array',
            'kelas.*.id' => 'required|exists:siswa_kelas,id',
            'kelas.*.TahunAjaran' => 'required|string',
            'kelas.*.KelaskelasID' => 'required|exists:kelas,kelasID',
        ]);

        foreach ($data['kelas'] as $kelas) {
            SiswaKelas::where('id', $kelas['id'])->update([
                'TahunAjaran' => $kelas['TahunAjaran'],
                'KelaskelasID' => $kelas['KelaskelasID'],
            ]);
        }

        return redirect()->route('siswa.edit.kelas', $siswaID)->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
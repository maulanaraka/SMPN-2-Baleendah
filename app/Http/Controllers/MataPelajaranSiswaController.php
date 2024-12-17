<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaranSiswa;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;

class MataPelajaranSiswaController extends Controller
{
    public function index($siswaID)
    {
        // Find the student
        $siswa = Siswa::findOrFail($siswaID);
    
        // Fetch the grades (nilai) based on the siswaKelasID
        // We'll group the data by siswaKelasID
        $mataPelajaranSiswa = MataPelajaranSiswa::with('mataPelajaran') // Eager load mataPelajaran
                                                ->where('SiswasiswaID', $siswaID)
                                                ->orderBy('siswa_kelassiswaKelasID') // Optional: order by kelas
                                                ->get();

        $mataPelajaran = MataPelajaran::all();
    
        // Pass the data to the view
        return view('siswa.edit.nilai.index', compact('siswa', 'mataPelajaranSiswa', 'mataPelajaran'));
    }      

    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $mataPelajaran = MataPelajaran::all();
        $siswaKelas = SiswaKelas::where('SiswasiswaID', $siswaID)->get();
        return view('siswa.edit.nilai.create', compact('siswa', 'mataPelajaran', 'siswaKelas'));
    }

    public function store(Request $request, $siswaID)
    {
        $request->validate([
            'MataPelajaranmataPelajaranID' => 'required|exists:mata_pelajaran,mataPelajaranID',
            'siswa_kelassiswaKelasID' => 'required|exists:siswa_kelas,siswaKelasID',
            'nilaiPengetahuan' => 'required|numeric',
            'predikatPengetahuan' => 'required|string',
            'deskripsiPengetahuan' => 'nullable|string',
            'nilaiKeterampilan' => 'required|numeric',
            'predikatKeterampilan' => 'required|string',
            'deskripsiKeterampilan' => 'nullable|string',
            'semester' => 'required|integer',
        ]);

        MataPelajaranSiswa::create([
            'SiswasiswaID' => $siswaID,
            'MataPelajaranmataPelajaranID' => $request->MataPelajaranmataPelajaranID,
            'siswa_kelassiswaKelasID' => $request->siswa_kelassiswaKelasID,
            'nilaiPengetahuan' => $request->nilaiPengetahuan,
            'predikatPengetahuan' => $request->predikatPengetahuan,
            'deskripsiPengetahuan' => $request->deskripsiPengetahuan,
            'nilaiKeterampilan' => $request->nilaiKeterampilan,
            'predikatKeterampilan' => $request->predikatKeterampilan,
            'deskripsiKeterampilan' => $request->deskripsiKeterampilan,
            'semester' => $request->semester,
        ]);

        return redirect()->route('siswa.nilai.index', $siswaID);
    }

    public function edit($siswaID, $mataPelajaranSiswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $mataPelajaranSiswa = MataPelajaranSiswa::findOrFail($mataPelajaranSiswaID);
        $mataPelajaran = MataPelajaran::all();
        $siswaKelas = SiswaKelas::where('SiswasiswaID', $siswaID)->get();
        return view('siswa.edit.nilai.edit', compact('siswa', 'mataPelajaranSiswa', 'mataPelajaran', 'siswaKelas'));
    }

    public function update(Request $request, $siswaID, $mataPelajaranSiswaID)
    {
        $request->validate([
            // 'MataPelajaranmataPelajaranID' => 'required|exists:mata_pelajaran,mataPelajaranID',
            'siswa_kelassiswaKelasID' => 'required|exists:siswa_kelas,siswaKelasID',
            'nilaiPengetahuan' => 'required|numeric',
            'predikatPengetahuan' => 'required|string',
            'deskripsiPengetahuan' => 'nullable|string',
            'nilaiKeterampilan' => 'required|numeric',
            'predikatKeterampilan' => 'required|string',
            'deskripsiKeterampilan' => 'nullable|string',
            'semester' => 'required|integer',
        ]);

        $mataPelajaranSiswa = MataPelajaranSiswa::findOrFail($mataPelajaranSiswaID);
        $mataPelajaranSiswa->update([
            // 'MataPelajaranmataPelajaranID' => $request->MataPelajaranmataPelajaranID,
            'siswa_kelassiswaKelasID' => $request->siswa_kelassiswaKelasID,
            'nilaiPengetahuan' => $request->nilaiPengetahuan,
            'predikatPengetahuan' => $request->predikatPengetahuan,
            'deskripsiPengetahuan' => $request->deskripsiPengetahuan,
            'nilaiKeterampilan' => $request->nilaiKeterampilan,
            'predikatKeterampilan' => $request->predikatKeterampilan,
            'deskripsiKeterampilan' => $request->deskripsiKeterampilan,
            'semester' => $request->semester,
        ]);

        return redirect()->route('siswa.nilai.index', $siswaID)->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy($siswaID, $mataPelajaranSiswaID)
    {
        MataPelajaranSiswa::destroy($mataPelajaranSiswaID);
        return redirect()->route('siswa.nilai.index', $siswaID);
    }
}


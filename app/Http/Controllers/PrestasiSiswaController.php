<?php

namespace App\Http\Controllers;

use App\Models\PrestasiSiswa;
use App\Models\Siswa;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiSiswaController extends Controller
{
    public function index($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswaPrestasi = PrestasiSiswa::with(['siswa', 'prestasi'])
                            ->where('SiswasiswaID', $siswaID)
                            ->get();
        return view('siswa.edit.prestasi_siswa.index', compact('siswa', 'siswaPrestasi'));
    }

    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $prestasi = Prestasi::all();
        return view('siswa.edit.prestasi_siswa.create', compact('siswa', 'prestasi'));
    }

    public function store(Request $request, $siswaID)
    {
        $validated = $request->validate([
            'PrestasiprestasiID' => 'required|exists:prestasi,prestasiID',
        ]);

        PrestasiSiswa::create([
            'SiswasiswaID' => $siswaID,
            'PrestasiprestasiID' => $validated['PrestasiprestasiID'],
        ]);

        return redirect()->route('siswa.prestasi_siswa.index', $siswaID)->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit($siswaID, $siswaPrestasiID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswaPrestasi = PrestasiSiswa::findOrFail($siswaPrestasiID);
        $prestasi = Prestasi::all();
        return view('siswa.edit.prestasi_siswa.edit', compact('siswa', 'siswaPrestasi', 'prestasi'));
    }

    public function update(Request $request, $siswaID, $siswaPrestasiID)
    {
        $validated = $request->validate([
            'PrestasiprestasiID' => 'required|exists:prestasi,prestasiID',
        ]);

        $siswaPrestasi = PrestasiSiswa::findOrFail($siswaPrestasiID);
        $siswaPrestasi->update([
            'PrestasiprestasiID' => $validated['PrestasiprestasiID'],
        ]);

        return redirect()->route('siswa.prestasi_siswa.index', $siswaID)->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy($siswaID, $siswaPrestasiID)
    {
        $siswaPrestasi = PrestasiSiswa::findOrFail($siswaPrestasiID);
        $siswaPrestasi->delete();

        return redirect()->route('siswa.prestasi_siswa.index', $siswaID)->with('success', 'Prestasi berhasil dihapus.');
    }
}

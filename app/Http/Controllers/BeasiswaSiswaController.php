<?php

namespace App\Http\Controllers;

use App\Models\BeasiswaSiswa;
use App\Models\Siswa;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaSiswaController extends Controller
{
    public function index($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswaBeasiswa = BeasiswaSiswa::with(['siswa', 'beasiswa'])
                            ->where('SiswasiswaID', $siswaID)
                            ->get();
        return view('siswa.edit.beasiswa_siswa.index', compact('siswa', 'siswaBeasiswa'));
    }

    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $beasiswa = Beasiswa::all();
        return view('siswa.edit.beasiswa_siswa.create', compact('siswa', 'beasiswa'));
    }

    public function store(Request $request, $siswaID)
    {
        $validated = $request->validate([
            'BeasiswabeasiswaID' => 'required|exists:beasiswa,beasiswaID',
        ]);

        BeasiswaSiswa::create([
            'SiswasiswaID' => $siswaID,
            'BeasiswabeasiswaID' => $validated['BeasiswabeasiswaID'],
        ]);

        return redirect()->route('siswa.beasiswa_siswa.index', $siswaID)->with('success', 'Beasiswa berhasil ditambahkan.');
    }

    public function edit($siswaID, $siswaBeasiswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswaBeasiswa = BeasiswaSiswa::findOrFail($siswaBeasiswaID);
        $beasiswa = Beasiswa::all();
        return view('siswa.edit.beasiswa_siswa.edit', compact('siswa', 'siswaBeasiswa', 'beasiswa'));
    }

    public function update(Request $request, $siswaID, $siswaBeasiswaID)
    {
        $validated = $request->validate([
            'BeasiswabeasiswaID' => 'required|exists:beasiswa,beasiswaID',
        ]);

        $siswaBeasiswa = BeasiswaSiswa::findOrFail($siswaBeasiswaID);
        $siswaBeasiswa->update([
            'BeasiswabeasiswaID' => $validated['BeasiswabeasiswaID'],
        ]);

        return redirect()->route('siswa.beasiswa_siswa.index', $siswaID)->with('success', 'Beasiswa berhasil diperbarui.');
    }

    public function destroy($siswaID, $siswaBeasiswaID)
    {
        $siswaBeasiswa = BeasiswaSiswa::findOrFail($siswaBeasiswaID);
        $siswaBeasiswa->delete();

        return redirect()->route('siswa.beasiswa_siswa.index', $siswaID)->with('success', 'Beasiswa berhasil dihapus.');
    }
}

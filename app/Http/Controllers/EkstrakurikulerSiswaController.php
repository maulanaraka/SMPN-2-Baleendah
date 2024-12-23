<?php

namespace App\Http\Controllers;

use App\Models\EkstrakurikulerSiswa;
use App\Models\Siswa;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerSiswaController extends Controller
{
    public function index($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswaEkstrakurikuler = EkstrakurikulerSiswa::with(['siswa', 'ekstrakurikuler'])
                                    ->where('SiswasiswaID', $siswaID)
                                    ->get();
        return view('siswa.edit.ekstrakurikuler_siswa.index', compact('siswa', 'siswaEkstrakurikuler'));
    }

    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('siswa.edit.ekstrakurikuler_siswa.create', compact('siswa', 'ekstrakurikuler'));
    }

    public function store(Request $request, $siswaID)
    {
        $validated = $request->validate([
            'EkstrakurikulerekstrakurikulerID' => 'required|exists:ekstrakurikuler,ekstrakurikulerID',
            'nilai' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
            'semester' => 'required|string',
        ]);

        EkstrakurikulerSiswa::create([
            'SiswasiswaID' => $siswaID,
            'EkstrakurikulerekstrakurikulerID' => $validated['EkstrakurikulerekstrakurikulerID'],
            'nilai' => $validated['nilai'],
            'keterangan' => $validated['keterangan'],
            'semester' => $validated['semester'],
        ]);

        return redirect()->route('siswa.ekstrakurikuler_siswa.index', $siswaID)->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit($siswaID, $siswaEkstrakurikulerID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswaEkstrakurikuler = EkstrakurikulerSiswa::findOrFail($siswaEkstrakurikulerID);
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('siswa.edit.ekstrakurikuler_siswa.edit', compact('siswa', 'siswaEkstrakurikuler', 'ekstrakurikuler'));
    }

    public function update(Request $request, $siswaID, $siswaEkstrakurikulerID)
    {
        $validated = $request->validate([
            'nilai' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
            'semester' => 'required|string',
        ]);

        $siswaEkstrakurikuler = EkstrakurikulerSiswa::findOrFail($siswaEkstrakurikulerID);
        $siswaEkstrakurikuler->update([
            'nilai' => $validated['nilai'],
            'keterangan' => $validated['keterangan'],
            'semester' => $validated['semester'],
        ]);

        return redirect()->route('siswa.ekstrakurikuler_siswa.index', $siswaID)->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($siswaID, $siswaEkstrakurikulerID)
    {
        $siswaEkstrakurikuler = EkstrakurikulerSiswa::findOrFail($siswaEkstrakurikulerID);
        $siswaEkstrakurikuler->delete();

        return redirect()->route('siswa.ekstrakurikuler_siswa.index', $siswaID)->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
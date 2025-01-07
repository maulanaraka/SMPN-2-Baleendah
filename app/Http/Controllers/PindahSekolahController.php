<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PindahSekolah;
use App\Models\Siswa;

class PindahSekolahController extends Controller
{
    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $pindahSekolah = new PindahSekolah();
        return view('siswa.input.pindah_sekolah', compact('siswa', 'pindahSekolah', 'siswaID'));
    }

    public function store(Request $request, $siswaID)
    {
        $request->validate([
            'pindahSekolahKe' => 'required|string',
            'dariKelas' => 'required|string',
            'tanggal' => 'required|date',
            'alamatSekolah' => 'required|string',
            'alasanPindah' => 'required|string',
        ]);

        PindahSekolah::create([
            'siswaID' => $siswaID,
            ...$request->all(),
        ]);

        return redirect()->route('siswa.pindah_sekolah.create', $siswaID)->with('success', 'Pindah Sekolah created successfully.');
    }
}

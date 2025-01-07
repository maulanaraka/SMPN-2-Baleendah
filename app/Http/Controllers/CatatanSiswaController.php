<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatatanSiswa;
use App\Models\Siswa;

class CatatanSiswaController extends Controller
{
    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $catatanSiswa = new CatatanSiswa();
        return view('siswa.input.catatan_siswa', compact('siswa', 'catatanSiswa', 'siswaID'));
    }

    public function store(Request $request, $siswaID)
    {
        $request->validate([
            'catatanPenting' => 'required|string',
        ]);

        CatatanSiswa::create([
            'SiswasiswaID' => $siswaID,
            'catatanPenting' => $request->catatanPenting,
        ]);

        return redirect()->route('siswa.catatan_siswa.create', $siswaID)->with('success', 'Catatan Siswa created successfully.');
    }
}

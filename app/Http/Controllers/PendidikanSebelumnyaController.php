<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendidikanSebelumnya;
use App\Models\Siswa;

class PendidikanSebelumnyaController extends Controller
{
    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $pendidikanSebelumnya = new PendidikanSebelumnya();
        return view('siswa.input.pendidikan_sblm', compact('siswa', 'pendidikanSebelumnya', 'siswaID'));
    }

    public function store(Request $request, $siswaID)
    {
        $request->validate([
            'namaSD' => 'required|string',
            'alamatSekolah' => 'required|string',
            'tanggalIjazah' => 'required|date',
            'noIjazah' => 'required|string',
        ]);

        PendidikanSebelumnya::create([
            'SiswasiswaID' => $siswaID,
            ...$request->all(),
        ]);

        return redirect()->route('siswa.pendidikan_sebelumnya.create', $siswaID)->with('success', 'Pendidikan Sebelumnya created successfully.');
    }
}

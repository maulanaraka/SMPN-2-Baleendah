<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelulusan;
use App\Models\Siswa;

class KelulusanController extends Controller
{
    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $kelulusan = new Kelulusan();
        return view('siswa.input.kelulusan', compact('siswa', 'kelulusan', 'siswaID'));
    }

    public function store(Request $request, $siswaID)
    {
        $request->validate([
            'noIjazah' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'melanjutkanSekolahKe' => 'nullable|string',
            'alamatSekolah' => 'nullable|string',
        ]);

        Kelulusan::create([
            'SiswasiswaID' => $siswaID,
            ...$request->all(),
        ]);

        return redirect()->route('siswa.kelulusan.create', $siswaID)->with('success', 'Kelulusan created successfully.');
    }

    public function edit($siswaID, $lulusID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $kelulusan = Kelulusan::findOrFail($lulusID);
        return view('siswa.edit.kelulusan', compact('siswa', 'kelulusan', 'siswaID'));
    }

    public function update(Request $request, $siswaID, $lulusID)
    {
        $request->validate([
            'noIjazah' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'melanjutkanSekolahKe' => 'nullable|string',
            'alamatSekolah' => 'nullable|string',
        ]);

        $kelulusan = Kelulusan::findOrFail($lulusID);
        $kelulusan->update($request->all());

        return redirect()->route('siswa.kelulusan.create', $siswaID)->with('success', 'Kelulusan updated successfully.');
    }
}

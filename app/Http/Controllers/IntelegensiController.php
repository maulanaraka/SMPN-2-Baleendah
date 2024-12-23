<?php

namespace App\Http\Controllers;

use App\Models\Intelegensi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IntelegensiController extends Controller
{
    public function index($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $intelegensi = Intelegensi::where('SiswasiswaID', $siswaID)->get();

        return view('siswa.edit.intelegensi.index', compact('siswa', 'intelegensi'));
    }

    public function create($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);

        return view('siswa.edit.intelegensi.create', compact('siswa'));
    }

    public function store(Request $request, $siswaID)
    {
        $request->validate([
            'intelegensiIQ' => 'required|integer',
            'tanggalTesIQ' => 'required|date',
            'disiplin' => 'required|integer',
            'kreativitas' => 'required|integer',
            'tanggungJawab' => 'required|integer',
            'penyesuaianDiri' => 'required|integer',
            'kemantapanEmosi' => 'required|integer',
            'kerjasama' => 'required|integer',
        ]);

        Intelegensi::create([
            'SiswasiswaID' => $siswaID,
            ...$request->only([
                'intelegensiIQ', 'tanggalTesIQ', 'disiplin', 'kreativitas', 'tanggungJawab',
                'penyesuaianDiri', 'kemantapanEmosi', 'kerjasama',
            ]),
        ]);

        return redirect()->route('siswa.intelegensi.index', $siswaID)->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($siswaID, $intelegensiID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $intelegensi = Intelegensi::findOrFail($intelegensiID);

        return view('siswa.edit.intelegensi.edit', compact('siswa', 'intelegensi'));
    }

    public function update(Request $request, $siswaID, $intelegensiID)
    {
        $request->validate([
            'intelegensiIQ' => 'required|integer',
            'tanggalTesIQ' => 'required|date',
            'disiplin' => 'required|integer',
            'kreativitas' => 'required|integer',
            'tanggungJawab' => 'required|integer',
            'penyesuaianDiri' => 'required|integer',
            'kemantapanEmosi' => 'required|integer',
            'kerjasama' => 'required|integer',
        ]);

        $intelegensi = Intelegensi::findOrFail($intelegensiID);
        $intelegensi->update($request->all());

        return redirect()->route('siswa.intelegensi.index', $siswaID)->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($siswaID, $intelegensiID)
    {
        Intelegensi::findOrFail($intelegensiID)->delete();

        return redirect()->route('siswa.intelegensi.index', $siswaID)->with('success', 'Data berhasil dihapus.');
    }
}

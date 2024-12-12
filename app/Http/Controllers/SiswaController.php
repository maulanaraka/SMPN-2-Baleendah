<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the siswa data.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function dataSiswa(Request $request)
    {
        $query = Siswa::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('NISN', 'like', "%{$search}%")
                  ->orWhere('namaLengkap', 'like', "%{$search}%");
        }

        $siswa = $query->paginate(10);

        return view('siswa.index', compact('siswa')); // Adjust view path
    }

    public function show($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        return view('siswa.show', compact('siswa')); // Adjust view path
    }

    public function edit($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        return view('siswa.edit.siswa', compact('siswa')); // Adjust view path
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validatedData = $request->validate([
            'NISN' => 'required|string',
            'namaLengkap' => 'required|string',
            'namaPanggilan' => 'nullable|string',
            'jenisKelamin' => 'required|string',
            'tempatLahir' => 'required|string',
            'tanggalLahir' => 'required|date',
            'agama' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'anakKe' => 'nullable|integer',
            'saudaraKandung' => 'nullable|integer',
            'saudaraTiri' => 'nullable|integer',
            'saudaraAngkat' => 'nullable|integer',
            'yatimPiatu' => 'required|string',
            'bahasaDirumah' => 'nullable|string',
        ]);

        $siswa->update($validatedData);

        return back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswa->delete();

        return redirect()->route('data-siswa')->with('success', 'Siswa berhasil dihapus.');
    }
}


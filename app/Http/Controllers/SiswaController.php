<?php

namespace App\Http\Controllers;

use App\Models\CatatanSiswa;
use App\Models\Intelegensi;
use App\Models\Kehadiran;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kesehatan;
use App\Models\PendidikanSebelumnya;
use App\Models\TempatTinggal;
use App\Models\Pendidikan;
use App\Models\Wali;
use Dompdf\Dompdf;

class SiswaController extends Controller
{
    public function create()
    {
        $siswaID = uniqid();
        return view('siswa.input.siswa', compact('siswaID')); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswaID' => 'required|string|unique:siswa,siswaID',
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

        $siswa = Siswa::create($validatedData);

        return redirect()->route('tempat_tinggal.input', ['siswaID' => $siswa->siswaID])->with('success', 'Data siswa berhasil disimpan! Silakan tambahkan data tempat tinggal.');
    }
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.data-siswa', compact('siswa'));
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

        return view('siswa.data-siswa', compact('siswa')); // Adjust view path
    }

    public function show($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $tinggal = TempatTinggal::where('SiswasiswaID', $siswaID)->first();
        $kesehatan = Kesehatan::where('SiswasiswaID', $siswaID)->first();
        $pendidikan = PendidikanSebelumnya::where('SiswasiswaID', $siswaID)->first();
        $ortu = OrangTua::where('SiswasiswaID', $siswaID)->first();
        $wali = Wali::where('SiswasiswaID', $siswaID)->first();
        $intelegensi = Intelegensi::where('SiswasiswaID', $siswaID)->first();
        $kehadiran = Kehadiran::where('SiswasiswaID', $siswaID)->first();
        $catatan = CatatanSiswa::where('SiswasiswaID', $siswaID)->first();
        return view('siswa.detail-siswa', compact('siswa', 'tinggal', 'kesehatan', 'pendidikan', 'ortu', 'wali', 'intelegensi', 'kehadiran', 'catatan' )); // Adjust view path
    }

    public function generatePDF($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);

        $html = view('siswa.pdf', compact('siswa'))->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('Data_Siswa.pdf');
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

    public function showBackup()
    {
        return view('siswa.backup');
    }
    
    public function downloadBackup()
    {
         // Retrieve all student data
         $siswa = Siswa::all();

         // Convert the data to JSON
         $jsonSiswa = $siswa->toJson(JSON_PRETTY_PRINT);
 
         // Create a filename for the backup
         $fileName = 'backup_data_' . date('Y-m-d_H-i-s') . '.json';
 
         // Create a response with the JSON data as a download
         return Response::streamDownload(function() use ($jsonSiswa) {
             echo $jsonSiswa;
         }, $fileName, [
             'Content-Type' => 'application/json',
             'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
         ]);
    }

    public function destroy($siswaID)
    {
        $siswa = Siswa::findOrFail($siswaID);
        $siswa->delete();

        return redirect()->route('data-siswa')->with('success', 'Siswa berhasil dihapus.');
    }
}


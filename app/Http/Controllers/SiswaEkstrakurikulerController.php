<?php

namespace App\Http\Controllers;

use App\Models\SiswaEkstrakurikuler;
use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaEkstrakurikulerController extends Controller
{
    public function index($SiswasiswaID)
    {
        $siswa = Siswa::findOrFail($SiswasiswaID);
        $data = SiswaEkstrakurikuler::where('SiswasiswaID', $SiswasiswaID)->with('ekstrakurikuler')->get();
        return view('siswa.edit.ekstrakurikuler.index', compact('data', 'SiswasiswaID', 'siswa'));
    }

    public function create($SiswasiswaID)
    {
        $siswa = Siswa::findOrFail($SiswasiswaID);
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('siswa.edit.ekstrakurikuler.create', compact('siswa', 'ekstrakurikuler', 'SiswasiswaID'));
    }

    public function store(Request $request, $SiswasiswaID)
    {
        $validated = $request->validate([
            'EkstrakurikulerekstrakurikulerID' => 'required|integer',
            'nilai' => 'nullable|integer',
            'keterangan' => 'nullable|string|max:255',
            'semester' => 'nullable|integer',
            'tahunAjaran' => 'required|string|max:10',
        ]);
    
        // Add SiswasiswaID to the validated data
        $validated['SiswasiswaID'] = $SiswasiswaID;
    
        // Create the record in the database
        SiswaEkstrakurikuler::create($validated);
    
        // Redirect to the appropriate route
        return redirect()->route('siswa.ekstrakurikuler.index', $SiswasiswaID);
    }
    

    public function edit($SiswasiswaID,$id)
    {
        $siswa = Siswa::findOrFail($SiswasiswaID);
        $data = SiswaEkstrakurikuler::findOrFail($id);
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view('siswa.edit.ekstrakurikuler.edit', compact('data', 'ekstrakurikuler', 'siswa'));
    }

    public function update(Request $request, $siswaID, $id)
    {
        $validated = $request->validate([
            'nilai' => 'nullable|integer',
            'keterangan' => 'nullable|string|max:255',
            'semester' => 'nullable|integer',
            'tahunAjaran' => 'required|string|max:10',
        ]);
    
        $ekstra = SiswaEkstrakurikuler::findOrFail($id);
        $ekstra->update($validated);
    
        return redirect()->route('siswa.ekstrakurikuler.index', $siswaID);
    }    

    public function destroy($id)
    {
        $data = SiswaEkstrakurikuler::findOrFail($id);
        $SiswasiswaID = $data->SiswasiswaID;
        $data->delete();

        return redirect()->route('siswa.ekstrakurikuler.index', $SiswasiswaID)
                        ->with('success', 'Ekstrakurikuler deleted successfully');
    }
}

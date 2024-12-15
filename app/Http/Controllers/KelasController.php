<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::all();
        return view('kelas.index', compact('kelass'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        Kelas::create($request->all());
        return redirect()->route('kelas.index');
    }

    public function edit($kelasID)
    {
        $kelas = Kelas::find($kelasID);
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $kelasID)
    {
        $kelas = Kelas::find($kelasID);
        $kelas->update($request->all());
        return redirect()->route('kelas.index');
    }

    public function destroy($kelasID)
    {
        Kelas::destroy($kelasID);
        return redirect()->route('kelas.index');
    }
}


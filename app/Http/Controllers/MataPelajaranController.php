<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mataPelajarans = MataPelajaran::all();
        return view('mata_pelajaran.index', compact('mataPelajarans'));
    }

    public function create()
    {
        return view('mata_pelajaran.create');
    }

    public function store(Request $request)
    {
        MataPelajaran::create($request->all());
        return redirect()->route('mata_pelajaran.index');
    }

    public function edit($mataPelajaranID)
    {
        $mataPelajaran = MataPelajaran::find($mataPelajaranID);
        return view('mata_pelajaran.edit', compact('mataPelajaran'));
    }

    public function update(Request $request, $mataPelajaranID)
    {
        $mataPelajaran = MataPelajaran::find($mataPelajaranID);
        $mataPelajaran->update($request->all());
        return redirect()->route('mata_pelajaran.index');
    }

    public function destroy($mataPelajaranID)
    {
        MataPelajaran::destroy($mataPelajaranID);
        return redirect()->route('mata_pelajaran.index');
    }
}

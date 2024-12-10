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
        return view('data-siswa.index', compact('siswa'));
    }

    public function dataSiswa(Request $request)
    {
        // Start building the query
        $query = Siswa::query();
        
        // If search is filled, filter results based on search term
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('NISN', 'like', "%{$search}%")
                ->orWhere('namaLengkap', 'like', "%{$search}%");
        }
        
        // Paginate the results, 10 per page
        $siswa = $query->paginate(10);
        
        // Return the view with the paginated siswa data
        return view('data-siswa.index', compact('siswa'));
    }

    public function edit($siswaID)
    {
        // Find siswa by ID or fail if not found
        $siswa = Siswa::findOrFail($siswaID);
        return view('siswa.edit', compact('siswa'));
    }

    public function destroy($siswaID)
    {
        // Find siswa by ID or fail if not found
        $siswa = Siswa::findOrFail($siswaID);
        
        // Delete the siswa record
        $siswa->delete();
        
        // Redirect back to the siswa list with a success message
        return redirect()->route('data-siswa')->with('success', 'Siswa berhasil dihapus.');
    }
}

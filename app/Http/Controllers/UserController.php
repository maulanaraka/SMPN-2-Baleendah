<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa; // Import the Siswa model

class UserController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function admin()
    {
        return view('admin.index', ['user' => Auth::user()]);
    }

    /**
     * Show the operator dashboard.
     */
    public function operator()
    {
        return view('operator.index', ['user' => Auth::user()]);
    }

    /**
     * Show the staff dashboard.
     */
    public function staff()
    {
        // Fetch the total number of students
        $totalSiswa = Siswa::count();

        // Fetch the number of male students
        $siswaLakiLaki = Siswa::where('jenisKelamin', 'Laki-laki')->count();

        // Fetch the number of female students
        $siswiPerempuan = Siswa::where('jenisKelamin', 'Perempuan')->count();

        // Pass the data to the view
        return view('staff.index', [
            'user' => Auth::user(),
            'totalSiswa' => $totalSiswa,
            'siswaLakiLaki' => $siswaLakiLaki,
            'siswiPerempuan' => $siswiPerempuan,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve all siswa IDs from the siswa table
        $siswaIDs = DB::table('siswa')->pluck('siswaID');

        foreach ($siswaIDs as $siswaID) {
            DB::table('kehadiran')->insert([
                'SiswasiswaID' => $siswaID,
                'kelas' => '10A', // Example class
                'semester' => random_int(1, 2),
                'jumlahHadir' => $hadir = random_int(50, 100),
                'presentaseHadir' => round(($hadir / 100) * 100, 2),
                'sakit' => $sakit = random_int(0, 5),
                'izin' => $izin = random_int(0, 5),
                'alpa' => $alpa = random_int(0, 5),
                'jumlahTidakHadir' => $tidakHadir = $sakit + $izin + $alpa,
                'presentaseTidakHadir' => round(($tidakHadir / 100) * 100, 2),
                'jumlahHariBelajarEfektif' => $hadir - random_int(0, 5), // Example total days
            ]);
        }
    }
}

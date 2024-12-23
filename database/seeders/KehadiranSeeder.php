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
        // Retrieve all siswa IDs and their class enrollments (siswaKelasID)
        $siswaIDs = DB::table('siswa')->pluck('siswaID');

        foreach ($siswaIDs as $siswaID) {
            // Retrieve the two kelas IDs (class enrollments) for the student
            $kelasIDs = DB::table('siswa_kelas')
                ->where('SiswasiswaID', $siswaID)
                ->pluck('siswaKelasID');

            // Ensure there are exactly two records of siswaKelasID for each siswa
            if ($kelasIDs->count() < 4) {
                foreach ($kelasIDs as $kelasID) {
                    // Generate two attendance records for two semesters
                    for ($semester = 1; $semester <= 2; $semester++) {
                        // Generate random attendance data for this semester and class
                        $hadir = random_int(50, 100);
                        $sakit = random_int(0, 5);
                        $izin = random_int(0, 5);
                        $alpa = random_int(0, 5);
                        $tidakHadir = $sakit + $izin + $alpa;

                        // Insert the record for kehadiran
                        DB::table('kehadiran')->insert([
                            'SiswasiswaID' => $siswaID,
                            'siswa_kelassiswaKelasID' => $kelasID,
                            'semester' => $semester,
                            'jumlahHadir' => $hadir,
                            'presentaseHadir' => round(($hadir / 100) * 100, 2),
                            'sakit' => $sakit,
                            'izin' => $izin,
                            'alpa' => $alpa,
                            'jumlahTidakHadir' => $tidakHadir,
                            'presentaseTidakHadir' => round(($tidakHadir / 100) * 100, 2),
                            'jumlahHariBelajarEfektif' => $hadir - random_int(0, 5), // Example total days
                        ]);
                    }
                }
            }
        }
    }
}

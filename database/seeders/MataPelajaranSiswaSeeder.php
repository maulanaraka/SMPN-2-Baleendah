<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MataPelajaranSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch mataPelajaran and siswa_kelas data
        $mataPelajaranIDs = DB::table('mata_pelajaran')->pluck('mataPelajaranID');
        $siswaKelasRecords = DB::table('siswa_kelas')->get(); // Fetch all rows from siswa_kelas

        foreach ($siswaKelasRecords as $siswaKelas) {
            // Extract SiswasiswaID and KelaskelasID for each siswa_kelas
            $siswaID = $siswaKelas->SiswasiswaID;
            $kelasID = $siswaKelas->siswaKelasID;

            // Ensure we only create records for 2 semesters per siswa_kelas
            foreach (range(1, 2) as $semester) {
                foreach ($mataPelajaranIDs as $mataPelajaranID) {
                    DB::table('mata_pelajaran_siswa')->insert([
                        'SiswasiswaID' => $siswaID,
                        'MataPelajaranmataPelajaranID' => $mataPelajaranID,
                        'siswa_kelassiswaKelasID' => $kelasID, // Assign KelaskelasID
                        'nilaiPengetahuan' => $faker->randomFloat(2, 0, 100),
                        'predikatPengetahuan' => $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                        'deskripsiPengetahuan' => $faker->sentence(),
                        'nilaiKeterampilan' => $faker->randomFloat(2, 0, 100),
                        'predikatKeterampilan' => $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                        'deskripsiKeterampilan' => $faker->sentence(),
                        'semester' => $semester,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}

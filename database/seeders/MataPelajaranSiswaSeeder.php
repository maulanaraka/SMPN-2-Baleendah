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

        // Fetching the relevant IDs from related tables
        $siswaIDs = DB::table('siswa')->pluck('siswaID');
        $mataPelajaranIDs = DB::table('mata_pelajaran')->pluck('mataPelajaranID');
        $siswaKelasIDs = DB::table('siswa_kelas')->pluck('siswaKelasID');

        foreach ($siswaIDs as $siswaID) {
            foreach ($mataPelajaranIDs as $mataPelajaranID) {
                foreach ($siswaKelasIDs as $siswaKelasID) {
                    DB::table('mata_pelajaran_siswa')->insert([
                        'SiswasiswaID' => $siswaID,
                        'MataPelajaranmataPelajaranID' => $mataPelajaranID,
                        'siswa_kelassiswaKelasID' => $siswaKelasID,
                        'nilaiPengetahuan' => $faker->randomFloat(2, 0, 100),
                        'predikatPengetahuan' => $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                        'deskripsiPengetahuan' => $faker->sentence(),
                        'nilaiKeterampilan' => $faker->randomFloat(2, 0, 100),
                        'predikatKeterampilan' => $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                        'deskripsiKeterampilan' => $faker->sentence(),
                        'semester' => $faker->numberBetween(1, 2), // assuming 1 or 2 semesters
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch IDs of siswa and kelas
        $siswaIDs = DB::table('siswa')->pluck('siswaID');
        $kelasIDs = DB::table('kelas')->pluck('kelasID')->toArray();

        foreach ($siswaIDs as $siswaID) {
            $tahunStart = $faker->year;
            $tahunEnd = $tahunStart + 1;

            for ($i = 0; $i < 4; $i++) { // Allow up to 4 classes
                $kelasID = $faker->randomElement($kelasIDs);

                // Check if the combination already exists
                $exists = DB::table('siswa_kelas')->where([
                    ['SiswasiswaID', '=', $siswaID],
                    ['KelaskelasID', '=', $kelasID],
                    ['TahunAjaran', '=', "$tahunStart/$tahunEnd"],
                ])->exists();

                if (!$exists) {
                    DB::table('siswa_kelas')->insert([
                        'TahunAjaran' => "$tahunStart/$tahunEnd",
                        'SiswasiswaID' => $siswaID,
                        'KelaskelasID' => $kelasID,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $tahunStart++; // Increment the year for the next record
            }
        }
    }

}

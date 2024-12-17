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
            $tahunStart = $faker->year; // Starting academic year
            $maxClasses = $faker->numberBetween(1, 4); // Randomly assign up to 4 class records

            for ($i = 0; $i < $maxClasses; $i++) {
                // Generate random data
                $kelasID = $faker->randomElement($kelasIDs);
                $tanggalMasuk = $faker->dateTimeBetween("$tahunStart-07-01", "$tahunStart-12-31");
                $tanggalKeluar = (clone $tanggalMasuk)->modify('+1 year')->format('Y-m-d');
                $tahunEnd = $tahunStart + 1;

                DB::table('siswa_kelas')->insert([
                    'SiswasiswaID' => $siswaID,
                    'KelaskelasID' => $kelasID,
                    'TahunAjaran' => "$tahunStart/$tahunEnd",
                    'tanggalMasuk' => $tanggalMasuk->format('Y-m-d'),
                    'tanggalKeluar' => $faker->randomElement([null, $tanggalKeluar]),
                    'status' => $faker->randomElement(['aktif', 'nonaktif']),
                    'alasanPindah' => $faker->optional()->sentence(3),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Increment the academic year for the next record
                $tahunStart++;
            }
        }
    }
}

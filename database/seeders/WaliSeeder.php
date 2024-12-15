<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wali;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // Ensure there's at least one siswa for seeding
        $siswaIDs = DB::table('siswa')->pluck('siswaID');

        foreach ($siswaIDs as $siswaID) {
            // 90% chance to leave the Wali record empty
            if (rand(1, 10) <= 1) {  // 10% chance
                Wali::create([
                    'SiswasiswaID' => $siswaID,
                    'namaWali' => $faker->name,
                    'nomorTeleponWali' => $faker->phoneNumber,
                    'tempatLahirWali' => $faker->city,
                    'tanggalLahirWali' => $faker->date(),
                    'kewarganegaraanWali' => $faker->country,
                    'pendidikanTertinggiWali' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2', 'S3']),
                    'pekerjaanWali' => $faker->jobTitle,
                    'penghasilanWali' => $faker->numberBetween(1000000, 5000000),
                    'alamatWali' => $faker->address,
                    'hubunganDenganSiswa' => $faker->randomElement(['Ayah', 'Ibu', 'Saudara', 'Kakek', 'Nenek']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

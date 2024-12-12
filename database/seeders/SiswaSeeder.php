<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $tanggalLahir = $faker->date('Y-m-d');  // Generate a date as a string

            // Extract the last 3 digits of the year
            $yearLast3Digits = substr(date('Y', strtotime($tanggalLahir)), -3);

            // Generate a random 7-digit number
            $randomNumber = $faker->numberBetween(1000000, 9999999);

            // Combine to form the NISN (siswaID)
            $NISN = $yearLast3Digits . $randomNumber;

            DB::table('siswa')->insert([
                'siswaID' => $faker->unique()->numberBetween(1000000000, 9999999999),
                'NISN' => $NISN,
                'namaLengkap' => $faker->name,
                'namaPanggilan' => $faker->firstName,
                'jenisKelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempatLahir' => $faker->city,
                'tanggalLahir' => $tanggalLahir,
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katholik', 'Hindu', 'Buddha', 'Konghucu', 'Kejawen']),
                'kewarganegaraan' => $faker->country,
                'anakKe' => $faker->numberBetween(1, 5),
                'saudaraKandung' => $faker->numberBetween(0, 10),
                'saudaraTiri' => $faker->numberBetween(0, 5),
                'saudaraAngkat' => $faker->numberBetween(0, 5),
                'yatimPiatu' => $faker->randomElement(['Yatim', 'Piatu', 'Yatim Piatu', 'Tidak']),
                'bahasaDirumah' => $faker->randomElement(['Indonesia', 'Jawa', 'Sunda', 'Batak', 'Madura', 'Kucing', 'Nyamnyam']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

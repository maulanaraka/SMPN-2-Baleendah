<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class KesehatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Fetch all siswa IDs from the siswa table
        $siswaIDs = DB::table('siswa')->pluck('siswaID');

        // Loop through the siswa IDs and create kesehatan records
        foreach ($siswaIDs as $siswaID) {
            // Simulate whether the student passed
            $lulus = rand(0, 1); // 0 = not passed, 1 = passed
            
            DB::table('kesehatan')->insert([
                'SiswasiswaID' => $siswaID,
                'beratDiterima' => rand(30, 70), // Random weight between 30 and 70 kg
                'tinggiDiterima' => rand(140, 180), // Random height between 140 and 180 cm
                'beratLulus' => $lulus ? rand(30, 70) : null, // Set to null if not passed
                'tinggiLulus' => $lulus ? rand(140, 180) : null, // Set to null if not passed
                'golDarah' => $faker->randomElement(['A', 'B', 'AB', 'O']), // Random blood type
                'penyakitKhusus' => rand(0, 1) ? $faker->randomElement([$faker->word, 'Gabisa Jalan', 'Napas Jarang', 'Syndrome Sushi Tei', 'Kurang Kasih Sayang']) : null, // Random disease, set to null 50% of the time
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

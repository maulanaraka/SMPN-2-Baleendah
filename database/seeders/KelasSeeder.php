<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $generatedKelasIDs = []; // Keep track of generated kelasIDs

        foreach (range(1, 10) as $index) {
            do {
                $kelasID = $faker->numberBetween(7, 9) . $faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F']);
            } while (in_array($kelasID, $generatedKelasIDs)); // Ensure uniqueness

            $generatedKelasIDs[] = $kelasID; // Add to the list of generated IDs

            DB::table('kelas')->insert([
                'kelasID' => $kelasID,
                'tingkat' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

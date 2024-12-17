<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('mata_pelajaran')->insert([
                'mataPelajaran' => $faker->word,
                'deskripsiMataPelajaran' => $faker->sentence,
                'KKMPengetahuan' => $faker->numberBetween(50, 80),
                'KKMKeterampilan' => $faker->numberBetween(50, 80),
                'tingkat' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

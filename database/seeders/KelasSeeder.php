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

        foreach (range(1, 10) as $index) {
            DB::table('kelas')->insert([
                'kelas' => $faker->numberBetween(7, 9) . $faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F']),
                'tingkat' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

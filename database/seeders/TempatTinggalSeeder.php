<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TempatTinggal;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TempatTinggalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // Make sure there's at least one siswa for seeding
        $siswaIDs = DB::table('siswa')->pluck('siswaID');

        foreach ($siswaIDs as $siswaID) {
            TempatTinggal::create([
                'SiswasiswaID' => $siswaID,
                'jalan' => 'Jalan ' . $faker->word . ' No. ' . rand(1, 100) . ' XYZ',
                'kota' => $faker->city,
                'kodePos' => $faker->numberBetween(10000, 99999),
                'provinsi' => $faker->state,
                'tinggalBersama' => $faker->randomElement(['Orang Tua', 'Bapak', 'Ibu', 'Saudara', 'Ayam', 'Zeus', 'Mulyono']),
                'jarakKeSekolah' => number_format(rand(100, 2000) / 100, 2),
                'kendaraan' => $faker->randomElement(['Kuda', 'Anjing', 'Sapi', 'Babirusa', 'Jalan', 'Ngesot Pake Keyboard']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

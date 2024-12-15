<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrangTua;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrangTuaSeeder extends Seeder
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
            OrangTua::create([
                'SiswasiswaID' => $siswaID,
                'namaIbu' => $faker->name,
                'nomorTeleponIbu' => $faker->phoneNumber,
                'tempatLahirIbu' => $faker->city,
                'tanggalLahirIbu' => $faker->date(),
                'kewarganegaraanIbu' => $faker->country,
                'pendidikanTertinggiIbu' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2', 'S3']),
                'pekerjaanIbu' => $faker->jobTitle,
                'penghasilanIbu' => $faker->numberBetween(1000000, 5000000),
                'alamatIbu' => $faker->address,
                'namaAyah' => $faker->name,
                'nomorTeleponAyah' => $faker->phoneNumber,
                'tempatLahirAyah' => $faker->city,
                'tanggalLahirAyah' => $faker->date(),
                'kewarganegaraanAyah' => $faker->country,
                'pendidikanTertinggiAyah' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2', 'S3']),
                'pekerjaanAyah' => $faker->jobTitle,
                'penghasilanAyah' => $faker->numberBetween(1000000, 5000000),
                'alamatAyah' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

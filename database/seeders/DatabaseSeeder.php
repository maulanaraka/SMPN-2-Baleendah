<?php

namespace Database\Seeders;

use App\Models\TempatTinggal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call both UserSeeder and SiswaSeeder
        $this->call([
            UserSeeder::class,
            SiswaSeeder::class,
            KesehatanSeeder::class,
            TempatTinggalSeeder::class,
            OrangTuaSeeder::class,
            WaliSeeder::class,
            SiswaKelasSeeder::class,
            EkstrakurikulerSeeder::class,
            KelasSeeder::class,
            MataPelajaranSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaEkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $siswaIds = DB::table('siswa')->pluck('siswaID')->toArray();
        $ekstrakurikulerIds = DB::table('ekstrakurikuler')->pluck('ekstrakurikulerID')->toArray();

        if (empty($siswaIds) || empty($ekstrakurikulerIds)) {
            $this->command->info('No data found in `siswa` or `ekstrakurikuler` tables. Seeder skipped.');
            return;
        }

        $data = [];
        foreach ($siswaIds as $siswaId) {
            $randomEkstraId = $ekstrakurikulerIds[array_rand($ekstrakurikulerIds)];
            $data[] = [
                'SiswasiswaID' => $siswaId,
                'EkstrakurikulerekstrakurikulerID' => $randomEkstraId,
                'nilai' => rand(60, 100),
                'keterangan' => 'Generated by seeder',
                'semester' => rand(1, 2),
                'tahunAjaran' => '2024/2025', // Example year
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('siswa_ekstrakurikuler')->insert($data);

        $this->command->info(count($data) . ' records inserted into `siswa_ekstrakurikuler` table.');
    }
}

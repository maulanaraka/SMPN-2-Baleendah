<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class ChartController extends Controller
{
    public function getClassStats()
    {
        // Aggregate data by 'tingkat' and count male and female students with 'status' = 'aktif'
        $classStats = Kelas::select('tingkat')
            ->withCount([
                'siswaKelas as male_count' => function ($query) {
                    $query->where('status', 'aktif') // Ensure status is 'aktif'
                        ->whereHas('siswa', function ($subQuery) {
                            $subQuery->where('jenisKelamin', 'Laki-laki');
                        });
                },
                'siswaKelas as female_count' => function ($query) {
                    $query->where('status', 'aktif') // Ensure status is 'aktif'
                        ->whereHas('siswa', function ($subQuery) {
                            $subQuery->where('jenisKelamin', 'Perempuan');
                        });
                }
            ])
            ->get()
            ->groupBy('tingkat')
            ->map(function ($group, $tingkat) {
                return [
                    'tingkat' => $tingkat,
                    'male_count' => $group->sum('male_count'),
                    'female_count' => $group->sum('female_count'),
                ];
            });

        // Extract only the three levels (e.g., Kelas 7, Kelas 8, Kelas 9)
        $filteredStats = $classStats->only(['1', '2', '3']);

        // Map tingkat to class names (rename 1, 2, 3 to Kelas 7, Kelas 8, Kelas 9)
        $renamedStats = $filteredStats->mapWithKeys(function ($item, $key) {
            $mapping = [
                '1' => 'Kelas 7',
                '2' => 'Kelas 8',
                '3' => 'Kelas 9',
            ];
            return [$mapping[$key] => $item];
        });

        // Format data for Chart.js
        $labels = $renamedStats->keys()->toArray();                        // Class levels
        $maleCounts = $renamedStats->pluck('male_count')->toArray();      // Male student counts
        $femaleCounts = $renamedStats->pluck('female_count')->toArray();  // Female student counts

        // Return data as JSON
        return response()->json([
            'labels' => $labels,
            'male_counts' => $maleCounts,
            'female_counts' => $femaleCounts,
        ]);
    }

}

@extends('layouts.app')
@section('content')

<div class="p-4 sm:ml-60">
    <div class="p-2">
     <h1 class="text-2xl font-bold text-gray-800 mt-10">Selamat Datang, {{ $user->name }}!</h1>
     <p class="text-gray-600 mb-4">Ini adalah dashboard staff</p>
          <!-- Statistik Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <!-- Total Siswa -->
                <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md">
                     <div>
                          <h3 class="text-lg font-semibold text-gray-700">Total Siswa</h3>
                          <p class="text-2xl font-bold text-green-500">{{ $totalSiswa }}</p>
                     </div>
                     <div>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="green"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path></svg>
                     </div>
                </div>
                <!-- Siswa Laki-laki -->
                <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md">
                     <div>
                          <h3 class="text-lg font-semibold text-gray-700">Siswa Laki-laki</h3>
                          <p class="text-2xl font-bold text-blue-500">{{ $siswaLakiLaki }}</p>
                     </div>
                     <div>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="blue"><path d="M15.0491 8.53666L18.5858 5H14V3H22V11H20V6.41421L16.4633 9.95088C17.4274 11.2127 18 12.7895 18 14.5C18 18.6421 14.6421 22 10.5 22C6.35786 22 3 18.6421 3 14.5C3 10.3579 6.35786 7 10.5 7C12.2105 7 13.7873 7.57264 15.0491 8.53666ZM10.5 20C13.5376 20 16 17.5376 16 14.5C16 11.4624 13.5376 9 10.5 9C7.46243 9 5 11.4624 5 14.5C5 17.5376 7.46243 20 10.5 20Z"></path></svg>
                     </div>
                </div>
                <!-- Siswi Perempuan -->
                <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md">
                     <div>
                          <h3 class="text-lg font-semibold text-gray-700">Siswi Perempuan</h3>
                          <p class="text-2xl font-bold text-pink-500">{{ $siswiPerempuan }}</p>
                     </div>
                     <div>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="pink"><path d="M11 15.9339C7.33064 15.445 4.5 12.3031 4.5 8.5C4.5 4.35786 7.85786 1 12 1C16.1421 1 19.5 4.35786 19.5 8.5C19.5 12.3031 16.6694 15.445 13 15.9339V18H18V20H13V24H11V20H6V18H11V15.9339ZM12 14C15.0376 14 17.5 11.5376 17.5 8.5C17.5 5.46243 15.0376 3 12 3C8.96243 3 6.5 5.46243 6.5 8.5C6.5 11.5376 8.96243 14 12 14Z"></path></svg>
                     </div>
                </div>
          </div>

          <!-- Statistik Kelas -->
          <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Statistik Kelas</h3>
                <canvas id="classStats" class="w-full"></canvas>
          </div>
    </div>

    <!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/class-stats')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('classStats').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels, // Class levels (e.g., Kelas 7, Kelas 8)
                        datasets: [
                            {
                                label: 'Laki-laki',
                                data: data.male_counts,
                                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                            },
                            {
                                label: 'Perempuan',
                                data: data.female_counts,
                                backgroundColor: 'rgba(236, 72, 153, 0.8)',
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching class stats:', error));
    });
</script>

 
</div>
@endsection
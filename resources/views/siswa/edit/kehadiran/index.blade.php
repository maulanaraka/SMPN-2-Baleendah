@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

    @if (session('success'))
        <!-- Toast Success (Modal Style) -->
        <div id="toast-success" class="fixed bottom-4 right-4 w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-green-500 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>

        <script>
            // JavaScript untuk menutup toast otomatis setelah beberapa detik
            setTimeout(() => {
                document.getElementById('toast-success').classList.add('hidden');
            }, 5000);  // Hide after 5 seconds
        </script>
    @endif

    <div class="p-4 sm:ml-60 min-h-screen">
        <div class="p-2">
            <h1 class="text-2xl font-semibold mt-10 mb-4">Data Kehadiran</h1>

            <a href="{{ route('siswa.kehadiran.create', $siswa->siswaID) }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 mb-3 inline-block">Tambah Kehadiran</a>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-200 text-gray-800">
                        <tr>
                            <th class="py-3 px-4 border-b text-center">No</th>
                            <th class="py-3 px-4 border-b text-center">Kelas</th>
                            <th class="py-3 px-4 border-b text-center">Semester</th>
                            <th class="py-3 px-4 border-b text-center">Jumlah Hadir</th>
                            <th class="py-3 px-4 border-b text-center">Presentase Hadir</th>
                            <th class="py-3 px-4 border-b text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1; // Initialize counter variable
                        @endphp
                        @foreach ($siswaKelas as $kelas)
                            @php
                                // Get kehadiran records for siswa_kelassiswaKelasID
                                $kelasKehadiran = $kehadiran->where('siswa_kelassiswaKelasID', $kelas->siswaKelasID);
                            @endphp
                            @foreach ($kelasKehadiran as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b text-center">{{ $counter++ }}</td> <!-- global counter variable -->
                                    <td class="py-3 px-4 border-b text-center">{{ $kelas->kelas->kelasID }}</td>
                                    <td class="py-3 px-4 border-b text-center">{{ $item->semester }}</td>
                                    <td class="py-3 px-4 border-b text-center">{{ $item->jumlahHadir }}</td>
                                    <td class="py-3 px-4 border-b text-center">{{ $item->presentaseHadir }}%</td>
                                    <td class="py-3 px-4 border-b text-center">
                                        <div class="flex justify-center space-x-2">
                                            @if(Auth::check() && Auth::user()->role === 'staff') <!-- Check if the user is a staff -->
                                                <!-- Tombol Edit -->
                                                <form action="{{ route('siswa.kehadiran.edit', [$siswa->siswaID, $item->kehadiranID]) }}" method="GET" class="inline" title="Edit">
                                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg p-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                                            <path d="M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('siswa.kehadiran.destroy', [$siswa->siswaID, $item->kehadiranID]) }}" method="POST" class="inline" title="Hapus">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kehadiran ini?')" class="bg-red-500 hover:bg-red-600 text-white rounded-lg p-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                                            <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

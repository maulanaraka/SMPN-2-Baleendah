@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa]) <!-- Pass the current siswa data -->

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
        <h1 class="text-2xl font-semibold mt-10 mb-4">Edit Kehadiran Siswa</h1>
        
        <!-- Edit Kehadiran -->
        <form action="{{ route('siswa.kehadiran.update', [$siswaID, $kehadiran->kehadiranID]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="semester" class="block mb-2 text-sm font-medium text-gray-900">Semester</label>
                    <input type="number" name="semester" id="semester" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly value="{{ $kehadiran->semester }}">
                </div>

                <div>
                    <label for="jumlahHadir" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Hadir</label>
                    <input type="number" name="jumlahHadir" id="jumlahHadir" value="{{ old('jumlahHadir', $kehadiran->jumlahHadir) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" oninput="calculatePercentages()">
                </div>

                <div>
                    <label for="presentaseHadir" class="block mb-2 text-sm font-medium text-gray-900">Presentase Hadir (%)</label>
                    <input type="number" step="0.01" name="presentaseHadir" id="presentaseHadir" value="{{ old('presentaseHadir', $kehadiran->presentaseHadir) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
                </div>

                <div>
                    <label for="sakit" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Sakit</label>
                    <input type="number" name="sakit" id="sakit" value="{{ old('sakit', $kehadiran->sakit) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" oninput="calculatePercentages()">
                </div>

                <div>
                    <label for="izin" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Izin</label>
                    <input type="number" name="izin" id="izin" value="{{ old('izin', $kehadiran->izin) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" oninput="calculatePercentages()">
                </div>

                <div>
                    <label for="alpa" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Alpa</label>
                    <input type="number" name="alpa" id="alpa" value="{{ old('alpa', $kehadiran->alpa) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" oninput="calculatePercentages()">
                </div>

                <div>
                    <label for="presentaseTidakHadir" class="block mb-2 text-sm font-medium text-gray-900">Presentase Tidak Hadir (%)</label>
                    <input type="number" step="0.01" name="presentaseTidakHadir" id="presentaseTidakHadir" value="{{ old('presentaseTidakHadir', $kehadiran->presentaseTidakHadir) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
                </div>

                <div>
                    <label for="jumlahHariBelajarEfektif" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Hari Belajar Efektif</label>
                    <input type="number" name="jumlahHariBelajarEfektif" id="jumlahHariBelajarEfektif" value="{{ old('jumlahHariBelajarEfektif', $kehadiran->jumlahHariBelajarEfektif) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Update</button>
                <a href="{{ route('siswa.kehadiran.index', $siswaID) }}" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function calculatePercentages() {
        // Get input values
        var jumlahHadir = parseFloat(document.getElementById('jumlahHadir').value) || 0;
        var sakit = parseFloat(document.getElementById('sakit').value) || 0;
        var izin = parseFloat(document.getElementById('izin').value) || 0;
        var alpa = parseFloat(document.getElementById('alpa').value) || 0;

        // Calculate jumlahTidakHadir (automatically computed)
        var jumlahTidakHadir = sakit + izin + alpa;

        // Calculate presentaseHadir and presentaseTidakHadir
        var totalHari = jumlahHadir + jumlahTidakHadir;

        var presentaseHadir = totalHari > 0 ? (jumlahHadir / totalHari) * 100 : 0;
        var presentaseTidakHadir = totalHari > 0 ? (jumlahTidakHadir / totalHari) * 100 : 0;

        // Update the percentage fields
        document.getElementById('presentaseHadir').value = presentaseHadir.toFixed(2);
        document.getElementById('presentaseTidakHadir').value = presentaseTidakHadir.toFixed(2);
    }

    // Initial call to populate the percentages on page load
    calculatePercentages();
</script>

@endsection
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
        <h1 class="text-2xl font-semibold mt-10 mb-4">Add Nilai Mata Pelajaran - {{ $siswa->namaLengkap }}</h1>
        
        <form action="{{ route('siswa.nilai.store', $siswa->siswaID) }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="MataPelajaranmataPelajaranID" class="block mb-2 text-sm font-medium text-gray-900">Mata Pelajaran</label>
                    <select name="MataPelajaranmataPelajaranID" id="MataPelajaranmataPelajaranID" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" disabled selected>Pilih Mata Pelajaran</option>
                        @foreach ($mataPelajaran as $mp)
                        <option value="{{ $mp->mataPelajaranID }}">{{ $mp->mataPelajaran }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="siswa_kelassiswaKelasID" class="block mb-2 text-sm font-medium text-gray-900">Kelas</label>
                    <select name="siswa_kelassiswaKelasID" id="siswa_kelassiswaKelasID" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($siswaKelas as $kelas)
                        <option value="{{ $kelas->siswaKelasID }}">{{ $kelas->kelas->kelasID }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="nilaiPengetahuan" class="block mb-2 text-sm font-medium text-gray-900">Nilai Pengetahuan</label>
                    <input type="number" name="nilaiPengetahuan" id="nilaiPengetahuan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" step="0.01" required>
                </div>

                <div>
                    <label for="predikatPengetahuan" class="block mb-2 text-sm font-medium text-gray-900">Predikat Pengetahuan</label>
                    <input type="text" name="predikatPengetahuan" id="predikatPengetahuan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="deskripsiPengetahuan" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Pengetahuan</label>
                    <textarea name="deskripsiPengetahuan" id="deskripsiPengetahuan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-10"></textarea>
                </div>

                <div>
                    <label for="nilaiKeterampilan" class="block mb-2 text-sm font-medium text-gray-900">Nilai Keterampilan</label>
                    <input type="number" name="nilaiKeterampilan" id="nilaiKeterampilan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" step="0.01" required>
                </div>

                <div>
                    <label for="predikatKeterampilan" class="block mb-2 text-sm font-medium text-gray-900">Predikat Keterampilan</label>
                    <input type="text" name="predikatKeterampilan" id="predikatKeterampilan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="deskripsiKeterampilan" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Keterampilan</label>
                    <textarea name="deskripsiKeterampilan" id="deskripsiKeterampilan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-10"></textarea>
                </div>

                <div>
                    <label for="semester" class="block mb-2 text-sm font-medium text-gray-900">Semester</label>
                    <select name="semester" id="semester" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="" disabled selected>Pilih Semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex justify-between">
                <!-- Save Button -->
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Tambah Nilai</button>
                
                <!-- Cancel Button -->
                <a href="{{ route('siswa.nilai.index', $siswa->siswaID) }}" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

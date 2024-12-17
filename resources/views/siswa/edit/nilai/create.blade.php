@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Add Nilai Mata Pelajaran - {{ $siswa->namaLengkap }}</h1>
        
        <form action="{{ route('siswa.nilai.store', $siswa->siswaID) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="MataPelajaranmataPelajaranID" class="block text-gray-700 font-medium mb-2">Mata Pelajaran</label>
                <select name="MataPelajaranmataPelajaranID" id="MataPelajaranmataPelajaranID" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200">
                    <option value="" class="text-gray-500" disabled selected>Pilih Mata Pelajaran</option>
                    @foreach ($mataPelajaran as $mp)
                    <option value="{{ $mp->mataPelajaranID }}">{{ $mp->mataPelajaran }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="siswa_kelassiswaKelasID" class="block text-gray-700 font-medium mb-2">Kelas</label>
                <select name="siswa_kelassiswaKelasID" id="siswa_kelassiswaKelasID" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200">
                    <option value="" class="text-gray-500" disabled selected>Pilih Kelas</option>
                    @foreach ($siswaKelas as $kelas)
                    <option value="{{ $kelas->siswaKelasID }}">{{ $kelas->kelas->kelasID }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="nilaiPengetahuan" class="block text-gray-700 font-medium mb-2">Nilai Pengetahuan</label>
                <input type="number" name="nilaiPengetahuan" id="nilaiPengetahuan" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200" step="0.01" required>
            </div>

            <div>
                <label for="predikatPengetahuan" class="block text-gray-700 font-medium mb-2">Predikat Pengetahuan</label>
                <input type="text" name="predikatPengetahuan" id="predikatPengetahuan" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200" required>
            </div>

            <div>
                <label for="deskripsiPengetahuan" class="block text-gray-700 font-medium mb-2">Deskripsi Pengetahuan</label>
                <textarea name="deskripsiPengetahuan" id="deskripsiPengetahuan" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"></textarea>
            </div>

            <div>
                <label for="nilaiKeterampilan" class="block text-gray-700 font-medium mb-2">Nilai Keterampilan</label>
                <input type="number" name="nilaiKeterampilan" id="nilaiKeterampilan" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200" step="0.01" required>
            </div>

            <div>
                <label for="predikatKeterampilan" class="block text-gray-700 font-medium mb-2">Predikat Keterampilan</label>
                <input type="text" name="predikatKeterampilan" id="predikatKeterampilan" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200" required>
            </div>

            <div>
                <label for="deskripsiKeterampilan" class="block text-gray-700 font-medium mb-2">Deskripsi Keterampilan</label>
                <textarea name="deskripsiKeterampilan" id="deskripsiKeterampilan" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"></textarea>
            </div>

            <div>
                <label for="semester" class="block text-gray-700 font-medium mb-2">Semester</label>
                <select name="semester" id="semester" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200" required>
                    <option value="" class="text-gray-500" disabled selected>Pilih Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-6">
                <!-- Save Button -->
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-indigo-200">
                    Save
                </button>
                
                <!-- Cancel Button -->
                <a href="{{ route('siswa.nilai.index', $siswa->siswaID) }}" 
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

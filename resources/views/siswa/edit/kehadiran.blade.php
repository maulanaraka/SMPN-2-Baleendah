@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa]) <!-- Pass the current siswa data -->

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Kehadiran Siswa</h1>
    
    <!-- Edit Kehadiran -->
    <form action="{{ route('kehadiran.update', $kehadiran->SiswasiswaID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="SiswasiswaID" class="block">Siswa ID</label>
            <input type="text" name="SiswasiswaID" 
                    id="SiswasiswaID" 
                    value="{{ old('SiswasiswaID', $kehadiran->SiswasiswaID) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg" readonly>
        </div>

        <div class="mb-4">
            <label for="kelas" class="block">Kelas</label>
            <input type="text" name="kelas" 
                    id="kelas" 
                    value="{{ old('kelas', $kehadiran->kelas) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="semester" class="block">Semester</label>
            <input type="number" name="semester" 
                    id="semester" 
                    value="{{ old('semester', $kehadiran->semester) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="jumlahHadir" class="block">Jumlah Hadir</label>
            <input type="number" name="jumlahHadir" 
                    id="jumlahHadir" 
                    value="{{ old('jumlahHadir', $kehadiran->jumlahHadir) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="presentaseHadir" class="block">Presentase Hadir (%)</label>
            <input type="number" step="0.01" name="presentaseHadir" 
                    id="presentaseHadir" 
                    value="{{ old('presentaseHadir', $kehadiran->presentaseHadir) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="sakit" class="block">Jumlah Sakit</label>
            <input type="number" name="sakit" 
                    id="sakit" 
                    value="{{ old('sakit', $kehadiran->sakit) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="izin" class="block">Jumlah Izin</label>
            <input type="number" name="izin" 
                    id="izin" 
                    value="{{ old('izin', $kehadiran->izin) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="alpa" class="block">Jumlah Alpa</label>
            <input type="number" name="alpa" 
                    id="alpa" 
                    value="{{ old('alpa', $kehadiran->alpa) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="jumlahTidakHadir" class="block">Jumlah Tidak Hadir</label>
            <input type="number" name="jumlahTidakHadir" 
                    id="jumlahTidakHadir" 
                    value="{{ old('jumlahTidakHadir', $kehadiran->jumlahTidakHadir) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="presentaseTidakHadir" class="block">Presentase Tidak Hadir (%)</label>
            <input type="number" step="0.01" name="presentaseTidakHadir" 
                    id="presentaseTidakHadir" 
                    value="{{ old('presentaseTidakHadir', $kehadiran->presentaseTidakHadir) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="jumlahHariBelajarEfektif" class="block">Jumlah Hari Belajar Efektif</label>
            <input type="number" name="jumlahHariBelajarEfektif" 
                    id="jumlahHariBelajarEfektif" 
                    value="{{ old('jumlahHariBelajarEfektif', $kehadiran->jumlahHariBelajarEfektif) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection

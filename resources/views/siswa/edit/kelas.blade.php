@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Data Kelas Siswa</h1>
    <!-- Edit Wali -->
    <form action="{{ route('siswa_kelas.update', $kelas->SiswasiswaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="namaWali" class="block">Kelas</label>
            <input type="text" name="namaWali" value="{{ old('namaWali', $wali->namaWali ?? '')}}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="alamatWali" class="block">Tahun Ajaran</label>
            <input type="text" name="alamatWali" value="{{ old('alamatWali', $wali->alamatWali ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="hubunganDenganSiswa" class="block">Hubungan Dengan Siswa</label>
            <input type="text" name="hubunganDenganSiswa" value="{{ old('hubunganDenganSiswa', $wali->hubunganDenganSiswa ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <!-- Add other fields for Wali similarly -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

@endsection

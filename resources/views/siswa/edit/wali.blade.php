@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Data Wali</h1>
    <a href="{{ route('orang_tua.edit', $siswa->siswaID) }}" 
        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
        Orang Tua
    </a>
    <!-- Edit Wali -->
    <form action="{{ route('wali.update', $siswa->siswaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="namaWali" class="block">Nama Wali</label>
            <input type="text" name="namaWali" value="{{ old('namaWali', $wali->namaWali ?? '')}}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="nomorTeleponWali" class="block">Nomor Telepon Wali</label>
            <input type="text" name="nomorTeleponWali" value="{{ old('nomorTeleponWali', $wali->nomorTeleponWali ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="tempatLahirWali" class="block">Tempat Lahir Wali</label>
            <input type="text" name="tempatLahirWali" value="{{ old('tempatLahirWali', $wali->tempatLahirWali ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="tanggalLahirWali" class="block">Tanggal Lahir Wali</label>
            <input type="date" name="tanggalLahirWali" value="{{ old('tanggalLahirWali', $wali->tanggalLahirWali ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="kewarganegaraanWali" class="block">Kewarganegaraan Wali</label>
            <input type="text" name="kewarganegaraanWali" value="{{ old('kewarganegaraanWali', $wali->kewarganegaraanWali ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="pendidikanTertinggiWali" class="block">Pendidikan Tertinggi Wali</label>
            <input type="text" name="pendidikanTertinggiWali" value="{{ old('pendidikanTertinggiWali', $wali->pendidikanTertinggiWali ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="pekerjaanWali" class="block">Pekerjaan Wali</label>
            <input type="text" name="pekerjaanWali" value="{{ old('pekerjaanWali', $wali->pekerjaanWali ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="penghasilanWali" class="block">Penghasilan Wali</label>
            <input type="number" name="penghasilanWali" value="{{ old('penghasilanWali', $wali->penghasilanWali ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="alamatWali" class="block">Alaamat Wali</label>
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

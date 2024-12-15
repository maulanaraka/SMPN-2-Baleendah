@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Data Orang Tua </h1>
    <a href="{{ route('wali.edit', $siswa->siswaID) }}" 
        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
        Wali
    </a>

    <!-- Edit Orang Tua -->

    <h1 class="text-2xl font-semibold mb-6">Data Ibu </h1>
    <form action="{{ route('orang_tua.update', $siswa->siswaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="namaIbu" class="block">Nama Ibu</label>
            <input type="text" name="namaIbu" value="{{ old('namaIbu', $orangTua->namaIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="nomorTeleponIbu" class="block">Nomor Telepon Ibu</label>
            <input type="text" name="nomorTeleponIbu" value="{{ old('nomorTeleponIbu', $orangTua->nomorTeleponIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="tempatLahirIbu" class="block">Tempat Lahir Ibu</label>
            <input type="text" name="tempatLahirIbu" value="{{ old('tempatLahirIbu', $orangTua->tempatLahirIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="tanggalLahirIbu" class="block">Tanggal Lahir Ibu</label>
            <input type="date" name="tanggalLahirIbu" value="{{ old('tanggalLahirIbu', $orangTua->tanggalLahirIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="kewarganegaraanIbu" class="block">Kewarganegaraan Ibu</label>
            <input type="text" name="kewarganegaraanIbu" value="{{ old('kewarganegaraanIbu', $orangTua->kewarganegaraanIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="pendidikanTertinggiIbu" class="block">Pendidikan Tertinggi Ibu</label>
            <input type="text" name="pendidikanTertinggiIbu" value="{{ old('pendidikanTertinggiIbu', $orangTua->pendidikanTertinggiIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="pekerjaanIbu" class="block">Pekerjaan Ibu</label>
            <input type="text" name="pekerjaanIbu" value="{{ old('pekerjaanIbu', $orangTua->pekerjaanIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="penghasilanIbu" class="block">Penghasilan Ibu</label>
            <input type="number" name="penghasilanIbu" value="{{ old('penghasilanIbu', $orangTua->penghasilanIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="alamatIbu" class="block">Alaamat Ibu</label>
            <input type="text" name="alamatIbu" value="{{ old('alamatIbu', $orangTua->alamatIbu ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <h1 class="text-2xl font-semibold mb-6">Data Ayah </h1>
        <div class="mb-4">
            <label for="namaAyah" class="block">Nama Ayah</label>
            <input type="text" name="namaAyah" value="{{ old('namaAyah', $orangTua->namaAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="nomorTeleponAyah" class="block">Nomor Telepon Ayah</label>
            <input type="text" name="nomorTeleponAyah" value="{{ old('nomorTeleponAyah', $orangTua->nomorTeleponAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="tempatLahirAyah" class="block">Tempat Lahir Ayah</label>
            <input type="text" name="tempatLahirAyah" value="{{ old('tempatLahirAyah', $orangTua->tempatLahirAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="tanggalLahirAyah" class="block">Tanggal Lahir Ayah</label>
            <input type="date" name="tanggalLahirAyah" value="{{ old('tanggalLahirAyah', $orangTua->tanggalLahirAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="kewarganegaraanAyah" class="block">Kewarganegaraan Ayah</label>
            <input type="text" name="kewarganegaraanAyah" value="{{ old('kewarganegaraanAyah', $orangTua->kewarganegaraanAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="pendidikanTertinggiAyah" class="block">Pendidikan Tertinggi Ayah</label>
            <input type="text" name="pendidikanTertinggiAyah" value="{{ old('pendidikanTertinggiAyah', $orangTua->pendidikanTertinggiAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="pekerjaanAyah" class="block">Pekerjaan Ayah</label>
            <input type="text" name="pekerjaanAyah" value="{{ old('pekerjaanAyah', $orangTua->pekerjaanAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="penghasilanAyah" class="block">Penghasilan Ayah</label>
            <input type="number" name="penghasilanAyah" value="{{ old('penghasilanAyah', $orangTua->penghasilanAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="alamatAyah" class="block">Alaamat Ayah</label>
            <input type="text" name="alamatAyah" value="{{ old('alamatAyah', $orangTua->alamatAyah ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <!-- Add other fields for Ibu and Ayah similarly -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

@endsection

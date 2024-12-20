@extends('layouts.app')

@section('content')
@include('layouts.sidebar-input')

@if (session('success'))
    <div class="alert alert-success bg-white text-black p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <h1 class="text-2xl font-semibold mt-10 mb-4">Tambah Data Orang Tua</h1>

        <form action="{{ route('orang_tua.input') }}" method="POST">
            @csrf
            <div class="border border-white p-2 rounded-lg text-center mb-5 bg-transparent text-black">
                <h2 class="text-xl font-semibold">Data Ibu</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="namaIbu" class="block mb-2 text-sm font-medium text-gray-900">Nama Ibu</label>
                    <input type="text" name="namaIbu" value="{{ old('namaIbu', $orangTua->namaIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="nomorTeleponIbu" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon Ibu</label>
                    <input type="text" name="nomorTeleponIbu" value="{{ old('nomorTeleponIbu', $orangTua->nomorTeleponIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tempatLahirIbu" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir Ibu</label>
                    <input type="text" name="tempatLahirIbu" value="{{ old('tempatLahirIbu', $orangTua->tempatLahirIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tanggalLahirIbu" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir Ibu</label>
                    <input type="date" name="tanggalLahirIbu" value="{{ old('tanggalLahirIbu', $orangTua->tanggalLahirIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kewarganegaraanIbu" class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan Ibu</label>
                    <input type="text" name="kewarganegaraanIbu" value="{{ old('kewarganegaraanIbu', $orangTua->kewarganegaraanIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pendidikanTertinggiIbu" class="block mb-2 text-sm font-medium text-gray-900">Pendidikan Tertinggi Ibu</label>
                    <input type="text" name="pendidikanTertinggiIbu" value="{{ old('pendidikanTertinggiIbu', $orangTua->pendidikanTertinggiIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pekerjaanIbu" class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaanIbu" value="{{ old('pekerjaanIbu', $orangTua->pekerjaanIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="penghasilanIbu" class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Ibu</label>
                    <input type="number" name="penghasilanIbu" value="{{ old('penghasilanIbu', $orangTua->penghasilanIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="alamatIbu" class="block mb-2 text-sm font-medium text-gray-900">Alamat Ibu</label>
                    <input type="text" name="alamatIbu" value="{{ old('alamatIbu', $orangTua->alamatIbu ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>

            <div class="border border-white p-2 rounded-lg text-center mb-5 mt-5 bg-transparent text-black">
                <h2 class="text-xl font-semibold">Data Ayah</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="namaAyah" class="block mb-2 text-sm font-medium text-gray-900">Nama Ayah</label>
                    <input type="text" name="namaAyah" value="{{ old('namaAyah', $orangTua->namaAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="nomorTeleponAyah" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon Ayah</label>
                    <input type="text" name="nomorTeleponAyah" value="{{ old('nomorTeleponAyah', $orangTua->nomorTeleponAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tempatLahirAyah" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir Ayah</label>
                    <input type="text" name="tempatLahirAyah" value="{{ old('tempatLahirAyah', $orangTua->tempatLahirAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tanggalLahirAyah" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir Ayah</label>
                    <input type="date" name="tanggalLahirAyah" value="{{ old('tanggalLahirAyah', $orangTua->tanggalLahirAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kewarganegaraanAyah" class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan Ayah</label>
                    <input type="text" name="kewarganegaraanAyah" value="{{ old('kewarganegaraanAyah', $orangTua->kewarganegaraanAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pendidikanTertinggiAyah" class="block mb-2 text-sm font-medium text-gray-900">Pendidikan Tertinggi Ayah</label>
                    <input type="text" name="pendidikanTertinggiAyah" value="{{ old('pendidikanTertinggiAyah', $orangTua->pendidikanTertinggiAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pekerjaanAyah" class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaanAyah" value="{{ old('pekerjaanAyah', $orangTua->pekerjaanAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="penghasilanAyah" class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Ayah</label>
                    <input type="number" name="penghasilanAyah" value="{{ old('penghasilanAyah', $orangTua->penghasilanAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="alamatAyah" class="block mb-2 text-sm font-medium text-gray-900">Alamat Ayah</label>
                    <input type="text" name="alamatAyah" value="{{ old('alamatAyah', $orangTua->alamatAyah ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Tambah Data</button>
                <a href="{{ route('wali.input')}}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">
                     Data Wali
                </a>
            </div>
        </form>
    </div>
</div>

@endsection

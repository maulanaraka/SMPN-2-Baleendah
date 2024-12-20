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
        <h1 class="text-2xl font-semibold mt-10 mb-4">Tambah Data Wali</h1>

        <form action="{{ route('wali.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="namaWali" class="block mb-2 text-sm font-medium text-gray-900">Nama Wali</label>
                    <input type="text" name="namaWali" value="{{ old('namaWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="nomorTeleponWali" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon Wali</label>
                    <input type="text" name="nomorTeleponWali" value="{{ old('nomorTeleponWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tempatLahirWali" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir Wali</label>
                    <input type="text" name="tempatLahirWali" value="{{ old('tempatLahirWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tanggalLahirWali" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir Wali</label>
                    <input type="date" name="tanggalLahirWali" value="{{ old('tanggalLahirWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kewarganegaraanWali" class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan Wali</label>
                    <input type="text" name="kewarganegaraanWali" value="{{ old('kewarganegaraanWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pendidikanTertinggiWali" class="block mb-2 text-sm font-medium text-gray-900">Pendidikan Tertinggi Wali</label>
                    <input type="text" name="pendidikanTertinggiWali" value="{{ old('pendidikanTertinggiWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pekerjaanWali" class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan Wali</label>
                    <input type="text" name="pekerjaanWali" value="{{ old('pekerjaanWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="penghasilanWali" class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Wali</label>
                    <input type="number" name="penghasilanWali" value="{{ old('penghasilanWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="alamatWali" class="block mb-2 text-sm font-medium text-gray-900">Alamat Wali</label>
                    <input type="text" name="alamatWali" value="{{ old('alamatWali') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="hubunganDenganSiswa" class="block mb-2 text-sm font-medium text-gray-900">Hubungan Dengan Siswa</label>
                    <input type="text" name="hubunganDenganSiswa" value="{{ old('hubunganDenganSiswa') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Tambah Data</button>
                <a href="{{ route('orang_tua.input') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">
                    Data Orang Tua
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

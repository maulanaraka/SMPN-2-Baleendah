@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa]) <!-- Pass the current siswa data -->
@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <h1 class="text-2xl font-semibold mt-10 mb-4">Edit Data Tempat Tinggal</h1>

        <form action="{{ route('tempat_tinggal.update', $tempatTinggal->tempatTinggalID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="jalan" class="block mb-2 text-sm font-medium text-gray-900">Jalan</label>
                    <input type="text" name="jalan" value="{{ old('jalan', $tempatTinggal->jalan) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kota" class="block mb-2 text-sm font-medium text-gray-900">Kota</label>
                    <input type="text" name="kota" value="{{ old('kota', $tempatTinggal->kota) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kodePos" class="block mb-2 text-sm font-medium text-gray-900">Kode Pos</label>
                    <input type="text" name="kodePos" value="{{ old('kodePos', $tempatTinggal->kodePos) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900">Provinsi</label>
                    <input type="text" name="provinsi" value="{{ old('provinsi', $tempatTinggal->provinsi) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tinggalBersama" class="block mb-2 text-sm font-medium text-gray-900">Tinggal Bersama</label>
                    <input type="text" name="tinggalBersama" value="{{ old('tinggalBersama', $tempatTinggal->tinggalBersama) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="jarakKeSekolah" class="block mb-2 text-sm font-medium text-gray-900">Jarak ke Sekolah (km)</label>
                    <input type="number" name="jarakKeSekolah" value="{{ old('jarakKeSekolah', $tempatTinggal->jarakKeSekolah) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required step="0.01">
                </div>
                <div>
                    <label for="kendaraan" class="block mb-2 text-sm font-medium text-gray-900">Kendaraan</label>
                    <input type="text" name="kendaraan" value="{{ old('kendaraan', $tempatTinggal->kendaraan) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

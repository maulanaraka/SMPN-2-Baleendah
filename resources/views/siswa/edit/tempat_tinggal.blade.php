@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa]) <!-- Pass the current siswa data -->
@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Data Tempat Tinggal</h1>

    <form action="{{ route('tempat_tinggal.update', $tempatTinggal->tempatTinggalID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="jalan" class="block">Jalan</label>
            <input type="text" name="jalan" value="{{ old('jalan', $tempatTinggal->jalan) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="kota" class="block">Kota</label>
            <input type="text" name="kota" value="{{ old('kota', $tempatTinggal->kota) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="kodePos" class="block">Kode Pos</label>
            <input type="text" name="kodePos" value="{{ old('kodePos', $tempatTinggal->kodePos) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="provinsi" class="block">Provinsi</label>
            <input type="text" name="provinsi" value="{{ old('provinsi', $tempatTinggal->provinsi) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="tinggalBersama" class="block">Tinggal Bersama</label>
            <input type="text" name="tinggalBersama" value="{{ old('tinggalBersama', $tempatTinggal->tinggalBersama) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="jarakKeSekolah" class="block">Jarak ke Sekolah (km)</label>
            <input type="number" name="jarakKeSekolah" value="{{ old('jarakKeSekolah', $tempatTinggal->jarakKeSekolah) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required step="0.01">
        </div>        

        <div class="mb-4">
            <label for="kendaraan" class="block">Kendaraan</label>
            <input type="text" name="kendaraan" value="{{ old('kendaraan', $tempatTinggal->kendaraan) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection

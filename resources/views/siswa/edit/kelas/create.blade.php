@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Tambah Kelas untuk {{ $siswa->namaLengkap }}</h1>

    <form action="{{ route('siswa.kelas.store', $siswa->siswaID) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="KelaskelasID" class="block font-medium">Kelas</label>
            <select name="KelaskelasID" id="KelaskelasID" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                <option value="" disabled selected>Pilih Kelas</option> <!-- Default empty option -->
                @foreach ($kelasList as $k)
                    <option value="{{ $k->kelasID }}">{{ $k->kelasID }}</option>
                @endforeach
            </select>
        </div>        

        <div class="mb-4">
            <label for="TahunAjaran" class="block font-medium">Tahun Ajaran</label>
            <input type="text" name="TahunAjaran" id="TahunAjaran" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block font-medium">Status</label>
            <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="tanggalMasuk" class="block font-medium">Tanggal Masuk</label>
            <input type="date" name="tanggalMasuk" id="tanggalMasuk" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="tanggalKeluar" class="block font-medium">Tanggal Keluar</label>
            <input type="date" name="tanggalKeluar" id="tanggalKeluar" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Tanggal Keluar">
        </div>

        <div class="mb-4">
            <label for="alasanPindah" class="block font-medium">Alasan Pindah</label>
            <textarea name="alasanPindah" id="alasanPindah" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan alasan pindah"></textarea>
        </div>

        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Tambah Kelas</button>
            <a href="{{ route('siswa.kelas.index', $siswa->siswaID) }}" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection

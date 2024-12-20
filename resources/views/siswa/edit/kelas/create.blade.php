@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <h1 class="text-2xl font-semibold mt-10 mb-4">Tambah Kelas untuk {{ $siswa->namaLengkap }}</h1>

        <form action="{{ route('siswa.kelas.store', $siswa->siswaID) }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="KelaskelasID" class="block mb-2 text-sm font-medium text-gray-900">Kelas</label>
                    <select name="KelaskelasID" id="KelaskelasID" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($kelasList as $k)
                            <option value="{{ $k->kelasID }}">{{ $k->kelasID }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="TahunAjaran" class="block mb-2 text-sm font-medium text-gray-900">Tahun Ajaran</label>
                    <input type="text" name="TahunAjaran" id="TahunAjaran" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                    <select name="status" id="status" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div>
                    <label for="tanggalMasuk" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Masuk</label>
                    <input type="date" name="tanggalMasuk" id="tanggalMasuk" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="tanggalKeluar" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Keluar</label>
                    <input type="date" name="tanggalKeluar" id="tanggalKeluar" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tanggal Keluar">
                </div>

                <div>
                    <label for="alasanPindah" class="block mb-2 text-sm font-medium text-gray-900">Alasan Pindah</label>
                    <textarea name="alasanPindah" id="alasanPindah" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan alasan pindah"></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Tambah Kelas</button>
                <a href="{{ route('siswa.kelas.index', $siswa->siswaID) }}" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection

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
        <h1 class="text-2xl font-semibold mt-10 mb-4">Tambah Data Siswa</h1>

        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="NISN" class="block mb-2 text-sm font-medium text-gray-900">NISN</label>
                    <input type="text" name="NISN" value="{{ old('NISN') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="namaLengkap" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" value="{{ old('namaLengkap') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="namaPanggilan" class="block mb-2 text-sm font-medium text-gray-900">Nama Panggilan</label>
                    <input type="text" name="namaPanggilan" value="{{ old('namaPanggilan') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                    <select name="jenisKelamin" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Laki-laki" {{ old('jenisKelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenisKelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="tempatLahir" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" value="{{ old('tempatLahir') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tanggalLahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" value="{{ old('tanggalLahir') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="agama" class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                    <input type="text" name="agama" value="{{ old('agama') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kewarganegaraan" class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="anakKe" class="block mb-2 text-sm font-medium text-gray-900">Anak Ke</label>
                    <input type="number" name="anakKe" value="{{ old('anakKe') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="saudaraKandung" class="block mb-2 text-sm font-medium text-gray-900">Saudara Kandung</label>
                    <input type="number" name="saudaraKandung" value="{{ old('saudaraKandung') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="saudaraTiri" class="block mb-2 text-sm font-medium text-gray-900">Saudara Tiri</label>
                    <input type="number" name="saudaraTiri" value="{{ old('saudaraTiri') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="saudaraAngkat" class="block mb-2 text-sm font-medium text-gray-900">Saudara Angkat</label>
                    <input type="number" name="saudaraAngkat" value="{{ old('saudaraAngkat') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="yatimPiatu" class="block mb-2 text-sm font-medium text-gray-900">Yatim Piatu</label>
                    <select name="yatimPiatu" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Tidak" {{ old('yatimPiatu') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Yatim" {{ old('yatimPiatu') == 'Yatim' ? 'selected' : '' }}>Yatim</option>
                        <option value="Piatu" {{ old('yatimPiatu') == 'Piatu' ? 'selected' : '' }}>Piatu</option>
                        <option value="Yatim Piatu" {{ old('yatimPiatu') == 'Yatim Piatu' ? 'selected' : '' }}>Yatim Piatu</option>
                    </select>
                </div>
                <div>
                    <label for="bahasaDirumah" class="block mb-2 text-sm font-medium text-gray-900">Bahasa di Rumah</label>
                    <input type="text" name="bahasaDirumah" value="{{ old('bahasaDirumah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Tambah Data</button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa]) <!-- Pass the current siswa data -->
@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Data Siswa</h1>

    <form action="{{ route('siswa.update', $siswa->siswaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="NISN" class="block">NISN</label>
            <input type="text" name="NISN" value="{{ old('NISN', $siswa->NISN) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="namaLengkap" class="block">Nama Lengkap</label>
            <input type="text" name="namaLengkap" value="{{ old('namaLengkap', $siswa->namaLengkap) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="namaPanggilan" class="block">Nama Panggilan</label>
            <input type="text" name="namaPanggilan" value="{{ old('namaPanggilan', $siswa->namaPanggilan) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="jenisKelamin" class="block">Jenis Kelamin</label>
            <select name="jenisKelamin" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                <option value="Laki-laki" {{ old('jenisKelamin', $siswa->jenisKelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenisKelamin', $siswa->jenisKelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="tempatLahir" class="block">Tempat Lahir</label>
            <input type="text" name="tempatLahir" value="{{ old('tempatLahir', $siswa->tempatLahir) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="tanggalLahir" class="block">Tanggal Lahir</label>
            <input type="date" name="tanggalLahir" value="{{ old('tanggalLahir', $siswa->tanggalLahir->format('Y-m-d')) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="agama" class="block">Agama</label>
            <input type="text" name="agama" value="{{ old('agama', $siswa->agama) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="kewarganegaraan" class="block">Kewarganegaraan</label>
            <input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan', $siswa->kewarganegaraan) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="anakKe" class="block">Anak Ke</label>
            <input type="number" name="anakKe" value="{{ old('anakKe', $siswa->anakKe) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="saudaraKandung" class="block">Saudara Kandung</label>
            <input type="number" name="saudaraKandung" value="{{ old('saudaraKandung', $siswa->saudaraKandung) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="saudaraTiri" class="block">Saudara Tiri</label>
            <input type="number" name="saudaraTiri" value="{{ old('saudaraTiri', $siswa->saudaraTiri) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="saudaraAngkat" class="block">Saudara Angkat</label>
            <input type="number" name="saudaraAngkat" value="{{ old('saudaraAngkat', $siswa->saudaraAngkat) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="yatimPiatu" class="block">Yatim Piatu</label>
            <select name="yatimPiatu" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                <option value="Tidak" {{ old('yatimPiatu', $siswa->yatimPiatu) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                <option value="Yatim" {{ old('yatimPiatu', $siswa->yatimPiatu) == 'Yatim' ? 'selected' : '' }}>Yatim</option>
                <option value="Piatu" {{ old('yatimPiatu', $siswa->yatimPiatu) == 'Piatu' ? 'selected' : '' }}>Piatu</option>
                <option value="Yatim Piatu" {{ old('yatimPiatu', $siswa->yatimPiatu) == 'Yatim Piatu' ? 'selected' : '' }}>Yatim Piatu</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="bahasaDirumah" class="block">Bahasa di Rumah</label>
            <input type="text" name="bahasaDirumah" value="{{ old('bahasaDirumah', $siswa->bahasaDirumah) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection

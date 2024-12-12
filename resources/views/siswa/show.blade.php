@extends('layouts.app')

@section('content')
<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Detail Data Siswa</h1>

    <div class="space-y-4">
        <p><strong>NISN:</strong> {{ $siswa->NISN }}</p>
        <p><strong>Nama Lengkap:</strong> {{ $siswa->namaLengkap }}</p>
        <p><strong>Nama Panggilan:</strong> {{ $siswa->namaPanggilan }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $siswa->jenisKelamin }}</p>
        <p><strong>Tempat Lahir:</strong> {{ $siswa->tempatLahir }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $siswa->tanggalLahir->format('d-m-Y') }}</p>
        <p><strong>Agama:</strong> {{ $siswa->agama }}</p>
        <p><strong>Kewarganegaraan:</strong> {{ $siswa->kewarganegaraan }}</p>
        <p><strong>Anak Ke:</strong> {{ $siswa->anakKe }}</p>
        <p><strong>Bahasa di Rumah:</strong> {{ $siswa->bahasaDirumah }}</p>
    </div>
    <div class="mt-6">
        <a href="{{ route('data-siswa') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Data Siswa</a>
    </div>
</div>
@endsection

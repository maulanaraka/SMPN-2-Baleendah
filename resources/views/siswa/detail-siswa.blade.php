@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <h1 class="text-2xl font-semibold mt-10 mb-4">Detail Data Siswa</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <div>
                <p><strong>NISN:</strong> {{ $siswa->NISN }}</p>
            </div>
            <div>
                <p><strong>Nama Lengkap:</strong> {{ $siswa->namaLengkap }}</p>
            </div>
            <div>
                <p><strong>Nama Panggilan:</strong> {{ $siswa->namaPanggilan }}</p>
            </div>
            <div>
                <p><strong>Jenis Kelamin:</strong> {{ $siswa->jenisKelamin }}</p>
            </div>
            <div>
                <p><strong>Tempat Lahir:</strong> {{ $siswa->tempatLahir }}</p>
            </div>
            <div>
                <p><strong>Tanggal Lahir:</strong> {{ $siswa->tanggalLahir->format('d-m-Y') }}</p>
            </div>
            <div>
                <p><strong>Agama:</strong> {{ $siswa->agama }}</p>
            </div>
            <div>
                <p><strong>Kewarganegaraan:</strong> {{ $siswa->kewarganegaraan }}</p>
            </div>
            <div>
                <p><strong>Anak Ke:</strong> {{ $siswa->anakKe }}</p>
            </div>
            <div>
                <p><strong>Bahasa di Rumah:</strong> {{ $siswa->bahasaDirumah }}</p>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('data-siswa') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Data Siswa</a>
        </div>
    </div>
</div>
@endsection

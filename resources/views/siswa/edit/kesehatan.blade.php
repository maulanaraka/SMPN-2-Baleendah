@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa]) <!-- Pass the current siswa data -->

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Data Kesehatan</h1>

    <form action="{{ route('kesehatan.update', $kesehatan->SiswasiswaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="beratDiterima" class="block">Berat Diterima</label>
            <input type="number" step="0.01" name="beratDiterima" value="{{ old('beratDiterima', $kesehatan->beratDiterima) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="tinggiDiterima" class="block">Tinggi Diterima</label>
            <input type="number" step="0.01" name="tinggiDiterima" value="{{ old('tinggiDiterima', $kesehatan->tinggiDiterima) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="beratLulus" class="block">Berat Lulus</label>
            <input type="number" step="0.01" name="beratLulus" value="{{ old('beratLulus', $kesehatan->beratLulus) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="tinggiLulus" class="block">Tinggi Lulus</label>
            <input type="number" step="0.01" name="tinggiLulus" value="{{ old('tinggiLulus', $kesehatan->tinggiLulus) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="golDarah" class="block">Golongan Darah</label>
            <input type="text" name="golDarah" value="{{ old('golDarah', $kesehatan->golDarah) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="penyakitKhusus" class="block">Penyakit Khusus</label>
            <input type="text" name="penyakitKhusus" value="{{ old('penyakitKhusus', $kesehatan->penyakitKhusus) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection

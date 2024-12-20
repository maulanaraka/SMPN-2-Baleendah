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
        <h1 class="text-2xl font-semibold mt-10 mb-4">Edit Data Kesehatan</h1>

        <form action="{{ route('kesehatan.update', $kesehatan->SiswasiswaID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="beratDiterima" class="block mb-2 text-sm font-medium text-gray-900">Berat Diterima</label>
                    <input type="number" step="0.01" name="beratDiterima" value="{{ old('beratDiterima', $kesehatan->beratDiterima) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tinggiDiterima" class="block mb-2 text-sm font-medium text-gray-900">Tinggi Diterima</label>
                    <input type="number" step="0.01" name="tinggiDiterima" value="{{ old('tinggiDiterima', $kesehatan->tinggiDiterima) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="beratLulus" class="block mb-2 text-sm font-medium text-gray-900">Berat Lulus</label>
                    <input type="number" step="0.01" name="beratLulus" value="{{ old('beratLulus', $kesehatan->beratLulus) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="tinggiLulus" class="block mb-2 text-sm font-medium text-gray-900">Tinggi Lulus</label>
                    <input type="number" step="0.01" name="tinggiLulus" value="{{ old('tinggiLulus', $kesehatan->tinggiLulus) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="golDarah" class="block mb-2 text-sm font-medium text-gray-900">Golongan Darah</label>
                    <input type="text" name="golDarah" value="{{ old('golDarah', $kesehatan->golDarah) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="penyakitKhusus" class="block mb-2 text-sm font-medium text-gray-900">Penyakit Khusus</label>
                    <input type="text" name="penyakitKhusus" value="{{ old('penyakitKhusus', $kesehatan->penyakitKhusus) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

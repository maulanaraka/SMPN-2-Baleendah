@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Data Kelas</h1>

    <form action="{{ route('siswa.kelas.update', [$siswa->siswaID, $kelasData->siswaKelasID]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="KelaskelasID" class="block font-medium text-gray-800">Kelas</label>
            <select name="KelaskelasID" id="KelaskelasID" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-900" required>
                @foreach ($kelasList as $k)
                    <option value="{{ $k->kelasID }}" {{ $k->kelasID == $kelasData->KelaskelasID ? 'selected' : '' }}>
                        {{ $k->kelasID }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="TahunAjaran" class="block font-medium text-gray-800">Tahun Ajaran</label>
            <input type="text" name="TahunAjaran" id="TahunAjaran"
                value="{{ old('TahunAjaran', $kelasData->TahunAjaran) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-900" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block font-medium text-gray-800">Status</label>
            <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-900" required>
                <option value="aktif" {{ $kelasData->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $kelasData->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="flex justify-between mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-indigo-200">Update</button>
            <a href="{{ route('siswa.kelas.index', $siswa->siswaID) }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-200">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

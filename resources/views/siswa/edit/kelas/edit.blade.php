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
        <h1 class="text-2xl font-semibold mt-10 mb-4">Edit Data Kelas</h1>

        <form action="{{ route('siswa.kelas.update', [$siswa->siswaID, $kelasData->siswaKelasID]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="KelaskelasID" class="block mb-2 text-sm font-medium text-gray-900">Kelas</label>
                    <select name="KelaskelasID" id="KelaskelasID" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        @foreach ($kelasList as $k)
                            <option value="{{ $k->kelasID }}" {{ $k->kelasID == $kelasData->KelaskelasID ? 'selected' : '' }}>
                                {{ $k->kelasID }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="TahunAjaran" class="block mb-2 text-sm font-medium text-gray-900">Tahun Ajaran</label>
                    <input type="text" name="TahunAjaran" id="TahunAjaran"
                        value="{{ old('TahunAjaran', $kelasData->TahunAjaran) }}"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                    <select name="status" id="status" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="aktif" {{ $kelasData->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $kelasData->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Update</button>
                <a href="{{ route('siswa.kelas.index', $siswa->siswaID) }}" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

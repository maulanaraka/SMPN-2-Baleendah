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
            <h1 class="text-2xl font-semibold mt-10 mb-4">Data Kelas</h1>

            <a href="{{ route('siswa.kelas.create', $siswa->siswaID) }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 mb-3 inline-block">Tambah Data</a>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-200 text-gray-800">
                        <tr>
                            <th class="py-3 px-4 border-b text-center">No</th>
                            <th class="py-3 px-4 border-b text-center">Kelas</th>
                            <th class="py-3 px-4 border-b text-center">Tingkat</th>
                            <th class="py-3 px-4 border-b text-center">Tahun Ajaran</th>
                            <th class="py-3 px-4 border-b text-center">Status</th>
                            <th class="py-3 px-4 border-b text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswaKelas as $kelas)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b text-center">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 border-b text-center">{{ $kelas->kelas->kelasID ?? 'Data not found' }}</td>
                                <td class="py-3 px-4 border-b text-center">{{ $kelas->kelas->tingkat ?? 'Data not found' }}</td>
                                <td class="py-3 px-4 border-b text-center">{{ $kelas->TahunAjaran }}</td>
                                <td class="py-3 px-4 border-b text-center">{{ ucfirst($kelas->status) }}</td>
                                <td class="py-3 px-4 border-b text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('siswa.kelas.edit', [$siswa->siswaID, $kelas->siswaKelasID]) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg p-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                                <path d="M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('siswa.kelas.destroy', [$siswa->siswaID, $kelas->siswaKelasID]) }}" method="POST" class="inline" title="Hapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-lg p-2" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-3 px-4 border-b">Belum ada data kelas untuk siswa ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

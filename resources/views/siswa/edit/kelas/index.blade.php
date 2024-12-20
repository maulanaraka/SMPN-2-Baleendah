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

            <a href="{{ route('siswa.kelas.create', $siswa->siswaID) }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 mb-3 inline-block">Tambah Kelas</a>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border-b">No</th>
                            <th class="py-2 px-4 border-b">Kelas</th>
                            <th class="py-2 px-4 border-b">Tingkat</th>
                            <th class="py-2 px-4 border-b">Tahun Ajaran</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswaKelas as $kelas)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b">{{ $kelas->kelas->kelasID ?? 'Data not found' }}</td>
                                <td class="py-2 px-4 border-b">{{ $kelas->kelas->tingkat ?? 'Data not found' }}</td>
                                <td class="py-2 px-4 border-b">{{ $kelas->TahunAjaran }}</td>
                                <td class="py-2 px-4 border-b">{{ ucfirst($kelas->status) }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('siswa.kelas.edit', [$siswa->siswaID, $kelas->siswaKelasID]) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-lg hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('siswa.kelas.destroy', [$siswa->siswaID, $kelas->siswaKelasID]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-2 px-4 border-b">Belum ada data kelas untuk siswa ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

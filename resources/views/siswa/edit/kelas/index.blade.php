@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

    @if (session('success'))
        <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <h1>Data Kelas</h1>

        {{-- Button for adding a new class --}}
        {{-- Uncomment the line below if you want to add a "Tambah Kelas" button --}}
        <a href="{{ route('siswa.kelas.create', $siswa->siswaID) }}" class="btn btn-primary mb-3">Tambah Kelas</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Tingkat</th>
                    <th>Tahun Ajaran</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswaKelas as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->kelas->kelasID ?? 'Data not found' }}</td>
                        <td>{{ $kelas->kelas->tingkat ?? 'Data not found' }}</td>
                        <td>{{ $kelas->TahunAjaran }}</td>
                        <td>{{ ucfirst($kelas->status) }}</td>
                        <td>
                            <a href="{{ route('siswa.kelas.edit', [$siswa->siswaID, $kelas->siswaKelasID]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('siswa.kelas.destroy', [$siswa->siswaID, $kelas->siswaKelasID]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data kelas untuk siswa ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

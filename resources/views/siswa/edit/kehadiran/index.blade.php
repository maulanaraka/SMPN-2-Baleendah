@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

    @if (session('success'))
        <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

<a href="{{ route('siswa.kehadiran.create', $siswa->siswaID) }}" class="btn btn-primary">Tambah Kehadiran</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Jumlah Hadir</th>
            <th>Presentase Hadir</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 1; // Initialize counter variable
        @endphp
        @foreach ($siswaKelas as $kelas)
            @php
                // Get kehadiran records for siswa_kelassiswaKelasID
                $kelasKehadiran = $kehadiran->where('siswa_kelassiswaKelasID', $kelas->siswaKelasID);
            @endphp
            @foreach ($kelasKehadiran as $item)
                <tr>
                    <td>{{ $counter++ }}</td> <!-- global counter variable -->
                    <td>{{ $kelas->kelas->kelasID }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>{{ $item->jumlahHadir }}</td>
                    <td>{{ $item->presentaseHadir }}%</td>
                    <td>
                        <a href="{{ route('siswa.kehadiran.edit', [$siswa->siswaID, $item->kehadiranID]) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('siswa.kehadiran.show', [$siswa->siswaID, $item->kehadiranID]) }}" class="btn btn-info">Show</a>
                        <form action="{{ route('siswa.kehadiran.destroy', [$siswa->siswaID, $item->kehadiranID]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@endsection

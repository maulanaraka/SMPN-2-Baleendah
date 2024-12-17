@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
<div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<h1>Nilai Mata Pelajaran - {{ $siswa->namaLengkap }}</h1>
<a href="{{ route('siswa.nilai.create', $siswa->siswaID) }}" class="btn btn-primary">Add Nilai</a>

<table>
    <thead>
        <tr>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Nilai Pengetahuan</th>
            <th>Nilai Keterampilan</th>
            <th>Semester</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mataPelajaranSiswa->groupBy('siswa_kelassiswaKelasID') as $siswaKelasID => $nilaiPerKelas)
            <tr>
                <td colspan="5"><strong>Kelas: {{ $nilaiPerKelas->first()->siswaKelas->kelas->kelasID ?? 'Data not found' }}</strong></td>
            </tr>
            @foreach ($nilaiPerKelas as $nilai)
                <tr>
                    <td></td> <!-- Empty cell for Kelas -->
                    <td>{{ $nilai->matapelajaran->mataPelajaran ?? 'Data not found' }}</td>
                    <td>{{ $nilai->nilaiPengetahuan }}</td>
                    <td>{{ $nilai->nilaiKeterampilan }}</td>
                    <td>{{ $nilai->semester }}</td>
                    <td>
                        <a href="{{ route('siswa.nilai.edit', [$siswa->siswaID, $nilai->mataPelajaranSiswaID]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('siswa.nilai.destroy', [$siswa->siswaID, $nilai->mataPelajaranSiswaID]) }}" method="POST" style="display:inline;">
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

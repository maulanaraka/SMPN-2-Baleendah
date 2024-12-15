<!-- resources/views/ekstrakurikuler/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Data Mata Pelajaran</h1>

        <a href="{{ route('mata_pelajaran.create') }}" class="btn btn-primary mb-3">Create New Mata Pelajaran</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Deskripsi</th>
                    <th>KKM Pengetahuan</th>
                    <th>KKM Keterampilan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mataPelajarans as $mataPelajaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mataPelajaran->mataPelajaran }}</td>
                        <td>{{ $mataPelajaran->deskripsiMataPelajaran }}</td>
                        <td>{{ $mataPelajaran->KKMPengetahuan }}</td>
                        <td>{{ $mataPelajaran->KKMKeterampilan }}</td>
                        <td>
                            <a href="{{ route('mata_pelajaran.edit', $mataPelajaran->mataPelajaranID) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('mata_pelajaran.destroy', $mataPelajaran->mataPelajaranID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

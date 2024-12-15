<!-- resources/views/kelas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Data Kelas</h1>

        <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Create New kelas</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Tingkat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelass as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->kelas }}</td>
                        <td>{{ $kelas->tingkat }}</td>
                        <td>
                            <a href="{{ route('kelas.edit', $kelas->kelasID) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('kelas.destroy', $kelas->kelasID) }}" method="POST" style="display:inline;">
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

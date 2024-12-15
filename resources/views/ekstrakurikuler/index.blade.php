<!-- resources/views/ekstrakurikuler/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Data Ekstrakurikuler</h1>

        <a href="{{ route('ekstrakurikuler.create') }}" class="btn btn-primary mb-3">Create New Ekstrakurikuler</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ekstrakurikulers as $ekstrakurikuler)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ekstrakurikuler->nama }}</td>
                        <td>{{ $ekstrakurikuler->deskripsi }}</td>
                        <td>
                            <a href="{{ route('ekstrakurikuler.edit', $ekstrakurikuler->ekstrakurikulerID) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('ekstrakurikuler.destroy', $ekstrakurikuler->ekstrakurikulerID) }}" method="POST" style="display:inline;">
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

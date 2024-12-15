<!-- resources/views/ekstrakurikuler/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Ekstrakurikuler</h1>

        <form action="{{ route('ekstrakurikuler.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save</button>
            <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>
        </form>
    </div>
@endsection

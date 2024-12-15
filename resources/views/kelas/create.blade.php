<!-- resources/views/ekstrakurikuler/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Kelas</h1>

        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tingkat">Tingkat</label>
                <input type="text" name="tingkat" id="tingkat" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>
        </form>
    </div>
@endsection

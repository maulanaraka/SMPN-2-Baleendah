<!-- resources/views/ekstrakurikuler/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kelas</h1>

        <form action="{{ route('kelas.update', $kelas->kelasID) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $kelas->kelas }}" required>
            </div>

            <div class="form-group">
                <label for="tingkat">Tingkat</label>
                <input type="text" name="tingkat" id="tingkat" class="form-control" value="{{ $kelas->tingkat }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>
        </form>
    </div>
@endsection

<!-- resources/views/ekstrakurikuler/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Mata Pelajaran</h1>

        <form action="{{ route('mata_pelajaran.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="mataPelajaran">Mata Pelajaran</label>
                <input type="text" name="mataPelajaran" id="mataPelajaran" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsiMataPelajaran">Deskripsi</label>
                <textarea name="deskripsiMataPelajaran" id="deskripsiMataPelajaran" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="KKMPengetahuan">KKM Pengetahuan</label>
                <input type="number" name="KKMPengetahuan" id="KKMPengetahuan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="KKMKeterampilan">KKM Keterampilan</label>
                <input type="number" name="KKMKeterampilan" id="KKMKeterampilan" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save</button>
            <a href="{{ route('mata_pelajaran.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>
        </form>
    </div>
@endsection

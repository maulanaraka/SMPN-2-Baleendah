@extends('layouts.app')

@section('content')
<h1>Edit Kehadiran Siswa</h1>

<form action="{{ route('kehadiran.update', [$siswaID, $kehadiran->kehadiranID]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="semester">Semester</label>
        <input type="number" name="semester" id="semester" class="form-control" value="{{ $kehadiran->semester }}">
    </div>

    <div class="form-group">
        <label for="jumlahHadir">Jumlah Hadir</label>
        <input type="number" name="jumlahHadir" id="jumlahHadir" class="form-control" value="{{ $kehadiran->jumlahHadir }}">
    </div>

    <!-- Add other fields here -->

    <button type="submit" class="btn btn-primary">Update Kehadiran</button>
</form>
@endsection

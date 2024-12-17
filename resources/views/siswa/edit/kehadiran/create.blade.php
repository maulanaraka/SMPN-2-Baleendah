@extends('layouts.app')

@section('content')
<h1>Create Kehadiran</h1>

<form action="{{ route('siswa.kehadiran.store', $siswaID) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="semester">Semester</label>
        <input type="number" name="semester" id="semester" class="form-control">
    </div>

    <div class="form-group">
        <label for="jumlahHadir">Jumlah Hadir</label>
        <input type="number" name="jumlahHadir" id="jumlahHadir" class="form-control">
    </div>

    <!-- Add other fields here -->

    <button type="submit" class="btn btn-primary">Create Kehadiran</button>
</form>
@endsection

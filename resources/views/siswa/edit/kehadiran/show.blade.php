@extends('layouts.app')

@section('content')
<h1>Detail Kehadiran Siswa</h1>

<p><strong>Semester:</strong> {{ $kehadiran->semester }}</p>
<p><strong>Jumlah Hadir:</strong> {{ $kehadiran->jumlahHadir }}</p>
<p><strong>Presentase Hadir:</strong> {{ $kehadiran->presentaseHadir }}%</p>

<a href="{{ route('kehadiran.index', $siswaID) }}" class="btn btn-primary">Back to List</a>
@endsection

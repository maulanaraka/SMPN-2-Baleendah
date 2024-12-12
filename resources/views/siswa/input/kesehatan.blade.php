@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h1>Input Data Kesehatan</h1>
    <form action="{{ route('kesehatan.store') }}" method="POST">
        @csrf
        <div>
            <label for="SiswasiswaID">Siswa ID</label>
            <input type="text" name="SiswasiswaID" value="{{ old('SiswasiswaID') }}" required>
        </div>
        <div>
            <label for="beratDiterima">Berat Diterima</label>
            <input type="number" step="0.01" name="beratDiterima" value="{{ old('beratDiterima') }}" required>
        </div>
        <div>
            <label for="tinggiDiterima">Tinggi Diterima</label>
            <input type="number" step="0.01" name="tinggiDiterima" value="{{ old('tinggiDiterima') }}" required>
        </div>
        <div>
            <label for="golDarah">Golongan Darah</label>
            <input type="text" name="golDarah" value="{{ old('golDarah') }}" required>
        </div>
        <div>
            <label for="penyakitKhusus">Penyakit Khusus</label>
            <input type="text" name="penyakitKhusus" value="{{ old('penyakitKhusus') }}">
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection

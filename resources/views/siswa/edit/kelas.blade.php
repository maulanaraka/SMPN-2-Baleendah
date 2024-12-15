@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Data Kelas Siswa</h1>
    <!-- Edit Wali -->
    <form action="{{ route('siswa_kelas.update', $siswa_kelas->SiswasiswaID) }}" method="POST">
        @csrf
        @method('PUT')
    
        @foreach ($siswaKelas as $kelas)
            <div class="mb-4">
                <label for="TahunAjaran_{{ $kelas->id }}" class="block">Tahun Ajaran</label>
                <input type="text" name="kelas[{{ $loop->index }}][TahunAjaran]" 
                        id="TahunAjaran_{{ $kelas->id }}" 
                        value="{{ old("kelas.$loop->index.TahunAjaran", $kelas->TahunAjaran) }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                
                <input type="hidden" name="kelas[{{ $loop->index }}][id]" value="{{ $kelas->id }}">
            </div>
            
            <div class="mb-4">
                <label for="KelaskelasID_{{ $kelas->id }}" class="block">Kelas</label>
                <select name="kelas[{{ $loop->index }}][KelaskelasID]" 
                        id="KelaskelasID_{{ $kelas->id }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    @foreach ($allKelas as $kelasOption)
                        <option value="{{ $kelasOption->kelasID }}" 
                                {{ $kelasOption->kelasID == $kelas->KelaskelasID ? 'selected' : '' }}>
                            {{ $kelasOption->namaKelas }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endforeach
    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
    
</div>

@endsection

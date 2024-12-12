@extends('layouts.app')

@section('content')
<div class="w-full h-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-6">Data Siswa</h1>
    
    <!-- Search Bar -->
    <div class="mb-4">
        <form action="{{ route('data-siswa') }}" method="GET">
            <input type="text" name="search" placeholder="Cari Siswa Berdasarkan NIS atau Nama..." value="{{ request('search') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </form>
    </div>
    
    <!-- Data Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">NISN</th>
                    <th class="py-2 px-4 border-b">Nama Lengkap</th>
                    <th class="py-2 px-4 border-b">Nama Panggilan</th>
                    <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                    <th class="py-2 px-4 border-b">Tempat Lahir</th>
                    <th class="py-2 px-4 border-b">Tanggal Lahir</th>
                    <th class="py-2 px-4 border-b">Agama</th>
                    <th class="py-2 px-4 border-b">Kewarganegaraan</th>
                    <th class="py-2 px-4 border-b">Anak Ke</th>
                    <th class="py-2 px-4 border-b">Bahasa di Rumah</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $data)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $data->siswaID }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->NISN }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->namaLengkap }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->namaPanggilan }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->jenisKelamin }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->tempatLahir }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->tanggalLahir->format('d-m-Y') }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->agama }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->kewarganegaraan }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->anakKe }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->bahasaDirumah }}</td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex space-x-2">
                            <a href="{{ route('siswa.show', $data->siswaID) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Detail</a>
                        </div>
                    </td>
                    <td class="py-2 px-4 border-b">
                        @if(Auth::check() && Auth::user()->role === 'staff') <!-- Check if the user is a staff -->
                            <div class="flex space-x-2">
                                <a href="{{ route('siswa.edit', $data->siswaID) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('siswa.destroy', $data->siswaID) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $siswa->links() }}
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')

<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <h1 class="text-2xl font-semibold mt-10 mb-4 text-gray-800">Data Siswa</h1>
        
        <!-- Search Bar -->
        <div class="mb-4">
            <form action="{{ route('data-siswa') }}" method="GET" class="relative">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari Siswa Berdasarkan NIS atau Nama..." 
                    value="{{ request('search') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z"/>
                </svg>
            </form>
        </div>
        
        <!-- Data Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="py-3 px-4 border-b text-center">NISN</th>
                        <th class="py-3 px-4 border-b text-center">Nama Lengkap</th>
                        <th class="py-3 px-4 border-b text-center">Jenis Kelamin</th>
                        <th class="py-3 px-4 border-b text-center">Tanggal Lahir</th>
                        <th class="py-3 px-4 border-b text-center">Kewarganegaraan</th>
                        <th class="py-3 px-4 border-b text-center">Anak Ke</th>
                        <th class="py-3 px-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswa as $data)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b text-center">{{ $data->NISN }}</td>
                        <td class="py-3 px-4 border-b text-center">{{ $data->namaLengkap }}</td>
                        <td class="py-3 px-4 border-b text-center">{{ $data->jenisKelamin }}</td>
                        <td class="py-3 px-4 border-b text-center">{{ $data->tanggalLahir->format('d-m-Y') }}</td>
                        <td class="py-3 px-4 border-b text-center">{{ $data->kewarganegaraan }}</td>
                        <td class="py-3 px-4 border-b text-center">{{ $data->anakKe }}</td>
                        <td class="py-3 px-4 border-b text-center">
                            <div class="flex justify-center space-x-2">
                                <!-- Tombol Detail -->
                                <form action="{{ route('siswa.show', $data->siswaID) }}" method="GET" class="inline" title="Detail">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                            <path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z"></path>
                                        </svg>
                                    </button>
                                </form>
                                @if(Auth::check() && Auth::user()->role === 'staff') <!-- Check if the user is a staff -->
                                    <!-- Tombol Edit -->
                                    <form action="{{ route('siswa.edit', $data->siswaID) }}" method="GET" class="inline" title="Edit">
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                                <path d="M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('siswa.destroy', $data->siswaID) }}" method="POST" class="inline" title="Hapus">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="bg-red-500 hover:bg-red-600 text-white rounded-lg p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                                <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="mt-4">
                {{ $siswa->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa]) <!-- Pass the current siswa data -->
@if (session('success'))
    <!-- Toast Success (Modal Style) -->
    <div id="toast-success" class="fixed bottom-4 right-4 w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-green-500 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    <script>
        // JavaScript untuk menutup toast otomatis setelah beberapa detik
        setTimeout(() => {
            document.getElementById('toast-success').classList.add('hidden');
        }, 5000);  // Hide after 5 seconds
    </script>
@endif
<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <h1 class="text-2xl font-semibold mt-10 mb-4">Edit Data Siswa</h1>

        <form action="{{ route('siswa.update', $siswa->siswaID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="NISN" class="block mb-2 text-sm font-medium text-gray-900">NISN</label>
                    <input type="text" name="NISN" value="{{ old('NISN', $siswa->NISN) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="namaLengkap" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" value="{{ old('namaLengkap', $siswa->namaLengkap) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="namaPanggilan" class="block mb-2 text-sm font-medium text-gray-900">Nama Panggilan</label>
                    <input type="text" name="namaPanggilan" value="{{ old('namaPanggilan', $siswa->namaPanggilan) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                    <select name="jenisKelamin" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Laki-laki" {{ old('jenisKelamin', $siswa->jenisKelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenisKelamin', $siswa->jenisKelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="tempatLahir" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" value="{{ old('tempatLahir', $siswa->tempatLahir) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tanggalLahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" value="{{ old('tanggalLahir', $siswa->tanggalLahir->format('Y-m-d')) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="agama" class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                    <input type="text" name="agama" value="{{ old('agama', $siswa->agama) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kewarganegaraan" class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan', $siswa->kewarganegaraan) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="anakKe" class="block mb-2 text-sm font-medium text-gray-900">Anak Ke</label>
                    <input type="number" name="anakKe" value="{{ old('anakKe', $siswa->anakKe) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="saudaraKandung" class="block mb-2 text-sm font-medium text-gray-900">Saudara Kandung</label>
                    <input type="number" name="saudaraKandung" value="{{ old('saudaraKandung', $siswa->saudaraKandung) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="saudaraTiri" class="block mb-2 text-sm font-medium text-gray-900">Saudara Tiri</label>
                    <input type="number" name="saudaraTiri" value="{{ old('saudaraTiri', $siswa->saudaraTiri) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="saudaraAngkat" class="block mb-2 text-sm font-medium text-gray-900">Saudara Angkat</label>
                    <input type="number" name="saudaraAngkat" value="{{ old('saudaraAngkat', $siswa->saudaraAngkat) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="yatimPiatu" class="block mb-2 text-sm font-medium text-gray-900">Yatim Piatu</label>
                    <select name="yatimPiatu" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Tidak" {{ old('yatimPiatu', $siswa->yatimPiatu) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Yatim" {{ old('yatimPiatu', $siswa->yatimPiatu) == 'Yatim' ? 'selected' : '' }}>Yatim</option>
                        <option value="Piatu" {{ old('yatimPiatu', $siswa->yatimPiatu) == 'Piatu' ? 'selected' : '' }}>Piatu</option>
                        <option value="Yatim Piatu" {{ old('yatimPiatu', $siswa->yatimPiatu) == 'Yatim Piatu' ? 'selected' : '' }}>Yatim Piatu</option>
                    </select>
                </div>
                <div>
                    <label for="bahasaDirumah" class="block mb-2 text-sm font-medium text-gray-900">Bahasa di Rumah</label>
                    <input type="text" name="bahasaDirumah" value="{{ old('bahasaDirumah', $siswa->bahasaDirumah) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <h1 class="text-2xl font-semibold mt-10 mb-4 text-center">LEMBAR BUKU INDUK PESERTA DIDIK SMP</h1>

        <div class="border p-4 rounded-lg bg-white shadow-md">
            <table class="table-auto border-collapse w-full text-sm">
                <tr>
                    <td colspan="4" class="text-center align-top">
                        <div style="border: 1px solid black; width: 100px; height: 130px; margin: auto;">
                            <p class="text-xs mt-24">Pas Photo 3x4</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="text-left py-2">A. Keterangan Pribadi Siswa</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Nama Lengkap</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->namaLengkap }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Nama Panggilan</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->namaPanggilan }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Jenis Kelamin</td>
                    <td class="border px-2 py-1">{{ $siswa->jenisKelamin }}</td>
                    <td class="border px-2 py-1">Tempat, Tanggal Lahir</td>
                    <td class="border px-2 py-1">{{ $siswa->tempatLahir }}, {{ $siswa->tanggalLahir->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Agama</td>
                    <td class="border px-2 py-1">{{ $siswa->agama }}</td>
                    <td class="border px-2 py-1">Kewarganegaraan</td>
                    <td class="border px-2 py-1">{{ $siswa->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Anak Ke</td>
                    <td class="border px-2 py-1">{{ $siswa->anakKe }}</td>
                    <td class="border px-2 py-1">Jumlah Saudara</td>
                    <td class="border px-2 py-1">{{ $siswa->jumlahSaudara }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Bahasa Sehari-hari di Rumah</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->bahasaDirumah }}</td>
                </tr>

                <tr>
                    <th colspan="4" class="text-left py-2">B. Keterangan Tempat Tinggal Siswa</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Alamat</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->alamat }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">No. Telepon</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->noTelepon }}</td>
                </tr>

                <tr>
                    <th colspan="4" class="text-left py-2">C. Keterangan Jasmani dan Kesehatan Siswa</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Berat Badan</td>
                    <td class="border px-2 py-1">{{ $siswa->beratBadan }} kg</td>
                    <td class="border px-2 py-1">Tinggi Badan</td>
                    <td class="border px-2 py-1">{{ $siswa->tinggiBadan }} cm</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Golongan Darah</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->golonganDarah }}</td>
                </tr>

                <tr>
                    <th colspan="4" class="text-left py-2">D. Keterangan Pendidikan Sebelumnya</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Asal Sekolah</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->asalSekolah }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Alamat Sekolah</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->alamatSekolah }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Nomor Ijazah</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->nomorIjazah }}</td>
                </tr>

                <tr>
                    <th colspan="4" class="text-left py-2">E. Keterangan Orang Tua Kandung</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Nama Ayah</td>
                    <td class="border px-2 py-1">{{ $siswa->namaAyah }}</td>
                    <td class="border px-2 py-1">Nama Ibu</td>
                    <td class="border px-2 py-1">{{ $siswa->namaIbu }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Pekerjaan Ayah</td>
                    <td class="border px-2 py-1">{{ $siswa->pekerjaanAyah }}</td>
                    <td class="border px-2 py-1">Pekerjaan Ibu</td>
                    <td class="border px-2 py-1">{{ $siswa->pekerjaanIbu }}</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-left py-2">F. Keterangan Wali</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Nama Wali</td>
                    <td class="border px-2 py-1">{{ $siswa->namaWali }}</td>
                    <td class="border px-2 py-1">Pekerjaan Wali</td>
                    <td class="border px-2 py-1">{{ $siswa->pekerjaanWali }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Alamat Wali</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->alamatWali }}</td>
                </tr>

                <tr>
                    <th colspan="4" class="text-left py-2">G. Keterangan Intelegensi, Kepribadian, dan Prestasi Siswa</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Intelegensi (IQ)</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->iq }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Kepribadian</td>
                    <td class="border px-2 py-1" colspan="3">
                        <ul>
                            <li>Disiplin: {{ $siswa->disiplin }}</li>
                            <li>Kreativitas: {{ $siswa->kreativitas }}</li>
                            <li>Tanggung Jawab: {{ $siswa->tanggungJawab }}</li>
                            <li>Kerjasama: {{ $siswa->kerjasama }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Prestasi</td>
                    <td class="border px-2 py-1" colspan="3">{{ $siswa->prestasi }}</td>
                </tr>

                <tr>
                    <th colspan="4" class="text-left py-2">H. Keterangan Kehadiran</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Semester 1</td>
                    <td class="border px-2 py-1">Hadir: {{ $siswa->hadir1 }}</td>
                    <td class="border px-2 py-1">Sakit: {{ $siswa->sakit1 }}</td>
                    <td class="border px-2 py-1">Izin: {{ $siswa->izin1 }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Semester 2</td>
                    <td class="border px-2 py-1">Hadir: {{ $siswa->hadir2 }}</td>
                    <td class="border px-2 py-1">Sakit: {{ $siswa->sakit2 }}</td>
                    <td class="border px-2 py-1">Izin: {{ $siswa->izin2 }}</td>
                </tr>

                <tr>
                    <th colspan="4" class="text-left py-2">I. Catatan Lain-lain</th>
                </tr>
                <tr>
                    <td class="border px-2 py-1" colspan="4">{{ $siswa->catatanLain }}</td>
                </tr>
            </table>
        </div>

        <div class="mt-6 text-center flex justify-center space-x-4">
            <a href="{{ route('data-siswa') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            <a href="#" class="bg-green-500 text-white px-4 py-2 rounded">Generate PDF</a>
        </div>
    </div>
</div>
@endsection
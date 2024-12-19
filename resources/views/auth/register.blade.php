@extends('layouts.app')
@section('public')
<div class="flex h-screen">
    <!-- Left Section -->
    <div class="w-1/2 bg-gradient-to-b from-green-600 to-green-200 relative">
        <div class="absolute top-8 left-8 flex items-center">
            <img src="{{ asset('img/Logo BUKIS.png') }}" alt="Logo BUKIS" class="h-8 w-10 mr-3">
            <a href="#" class="text-white text-2xl font-bold">BUKIS</a>
        </div>
        <div class="flex items-center justify-center h-full">
            <h1 class="text-white text-5xl font-bold">Apakah Anda <br>Belum Mempunyai <br>Akun?</h1>
        </div>
    </div>

    <!-- Right Section -->
    <div class="w-1/2 bg-white flex items-center justify-center">
        <div class="w-3/4">
            <h2 class="text-3xl font-bold mb-6">Daftar</h2>
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <!-- Name Input -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                </div>
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                </div>
                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                </div>
                <!-- Role Selection -->
                <div class="mb-6">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <!-- Register Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Daftar</button>
                </div>
            </form>
            <p class="text-sm text-gray-600 text-center">Sudah punya akun? <a href="/login" class="text-blue-500 hover:underline">Masuk di sini</a></p>
        </div>
    </div>
</div>
@endsection
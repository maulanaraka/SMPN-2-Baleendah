@extends('layouts.app')
@section('title', 'Login Page')
@section('public')
<div class="flex h-screen">
    <!-- Left Section -->
    <div class="w-1/2 bg-gradient-to-b from-green-600 to-green-200 relative">
        <div class="absolute top-8 left-8 flex items-center">
            <img src="{{ asset('img/Logo BUKIS.png') }}" alt="Logo BUKIS" class="h-8 w-10 mr-3">
            <a href="#" class="text-white text-2xl font-bold">BUKIS</a>
        </div>
        <div class="flex items-center justify-center h-full">
            <h1 class="text-white text-5xl font-bold">Selamat Datang!</h1>
        </div>
    </div>

    <!-- Right Section -->
    <div class="w-1/2 bg-white flex items-center justify-center">
        <div class="w-3/4">
            <h2 class="text-3xl font-bold mb-6">Masuk</h2>
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
                <!-- Login Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Masuk</button>
                </div>
            </form>
            <p class="text-sm text-gray-600 text-center">Belum punya akun? <a href="/register" class="text-blue-500 hover:underline">Daftar di sini</a></p>
        </div>
    </div>
</div>
@endsection


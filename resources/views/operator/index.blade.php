@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
     <h1 class="text-2xl font-bold text-gray-800 mt-10">Selamat Datang, {{ $user->name }}!</h1>
     <p class="text-gray-600 mb-4">Ini adalah dashboard operator</p>
    </div>
</div>
@endsection
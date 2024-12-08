@extends('layouts.app')
@section('content')
@extends('layouts.app')
@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center py-10">
    <div class="bg-white w-full max-w-md rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Welcome, {{ $user->name }}!</h1>
        <p class="text-gray-600 mb-4">This is admin dashboard.</p>

        <a href="/logout" class="inline-block bg-red-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 mb-4">
            Logout >>
        </a>

        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Quick Actions</h2>
            <ul class="space-y-2">
                <li>
                    <a href="/menu1" class="block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                        Menu 1
                    </a>
                </li>
                <li>
                    <a href="/menu2" class="block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                        Menu 2
                    </a>
                </li>
                <li>
                    <a href="/menu3" class="block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                        Menu 3
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@endsection
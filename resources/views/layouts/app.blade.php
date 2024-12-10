<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BUKIS Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-gradient-to-b from-[#a4b96b] to-[#f4f4f4]">

    <!-- Show Sidebar and Navbar Only for Authenticated Users -->
    @auth
        @if(Auth::user()->role == 'admin')
            @include('layouts.sidebar-admin')
            @include('layouts.navbar')
        @elseif(Auth::user()->role == 'operator')
            @include('layouts.sidebar-operator')
            @include('layouts.navbar')
        @elseif(Auth::user()->role == 'staff')
            @include('layouts.sidebar-staff')
            @include('layouts.navbar')
        @endif

        <!-- Main Content Area -->
        <div class="ml-[249px] mt-[75px] p-6">
            @yield('content')
        </div>
    @endauth

    <!-- Landing Page (Guest Users) -->
    @guest
        @yield('content')
    @endguest
</body>
</html>
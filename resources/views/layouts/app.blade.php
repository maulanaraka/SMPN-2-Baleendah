<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BUKIS Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo BUKIS.png') }}">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            letter-spacing: 0em;
        }
    </style>
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
  @vite(['resources/css/app.css','resources/js/app.js'])
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
        <div>
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @endauth

    <!-- Landing Page (Guest Users) -->
    @guest
        @yield('public')
    @endguest
</body>

</html>
@extends('layouts.app')

@section('Buku Induk Siswa', 'Landing Page') <!-- Optional: Set the title for this page -->

@section('content')
<body class="bg-gray-50">

    <!-- Navigation Bar -->
    <nav class="bg-blue-600 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white font-bold text-lg">Buku Induk</div>
            <ul class="flex space-x-6 text-white">
                <li><a href="#home" class="hover:text-gray-200">Home</a></li>
                <li><a href="#features" class="hover:text-gray-200">Features</a></li>
                <li><a href="#contact" class="hover:text-gray-200">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="h-screen bg-cover bg-center relative" style="background-image: url('https://via.placeholder.com/1500');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 py-32 text-center text-white">
            <h1 class="text-5xl font-bold mb-4">Welcome to Buku induk</h1>
            <p class="text-xl mb-8">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel cupiditate, obcaecati.</p>
            <a href="#features" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg text-xl">Learn More</a>
            <!-- Login Button -->
            <a href="{{ route('login') }}" class="bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-lg text-xl mt-4 inline-block">Login</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-semibold mb-12">Our Features</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-4">Feature One</h3>
                    <p class="text-lg text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-4">Feature Two</h3>
                    <p class="text-lg text-gray-700">Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-4">Feature Three</h3>
                    <p class="text-lg text-gray-700">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-semibold mb-8">Get in Touch</h2>
            <p class="text-xl mb-8">Have questions? Feel free to reach out to us!</p>
            <a href="mailto:contact@benzena.com" class="bg-white hover:bg-gray-100 text-blue-600 py-2 px-6 rounded-lg text-xl">Contact Us</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Benzena. All rights reserved.</p>
        </div>
    </footer>

</body>
@endsection
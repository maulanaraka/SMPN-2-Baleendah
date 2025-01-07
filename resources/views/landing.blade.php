<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKIS - Buku Induk Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            letter-spacing: 0em;
        }
    </style>
</head>

<body class="h-screen bg-cover bg-center" style="background-image: url('https://cdn.wallpapersafari.com/84/52/VvHazk.jpg');">
    <nav class="bg-transparent fixed w-full backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('img/Logo BUKIS.png') }}" alt="Logo BUKIS" class="h-8 w-10 mr-5">
                    <a href="#" class="text-white text-2xl font-bold">BUKIS</a>
                </div>
                <div>
                    <a href="/login" class="px-4 py-2 border border-white text-white font-bold rounded-lg shadow-md hover:bg-white hover:text-green-500 transition">Masuk</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="h-full flex items-center justify-start">
        <div class="w-full max-w-2xl mx-auto text-left">
            <h1 class="text-4xl md:text-5xl font-regular text-white leading-tight">Selamat Datang Di Website</h1>
            <h2 class="text-4xl md:text-5xl font-bold text-white mt-6">Buku Induk Siswa</h2>
            <p class="text-4xl md:text-5xl font-regular text-white mt-6">SMPN 2 Baleendah</p>

            <div class="mt-8">
                <a href="/login" class="px-6 py-3 border border-white text-white font-bold rounded-lg shadow-md hover:bg-white hover:text-green-500 transition">Mulai</a>
            </div>
        </div>
    </div>

    <section class="h-screen bg-gradient-to-b from-green-600 to-gray-200 flex flex-col items-center justify-center">
        <h2 class="text-4xl md:text-5xl font-regular text-white mb-6">Tujuan <span class="text-4xl md:text-5xl font-bold text-white">Website</span> ini dibuat</h2>
        <div class="w-4/5 md:w-2/3 bg-gray-200 rounded-lg h-auto mb-4">
            <img src="{{ asset('img/Gambar Landing.png') }}" alt="Gambar Landing" class="rounded-lg w-full h-full object-cover">
        </div>
        <p class="text-center text-gray-700 text-lg md:text-xl max-w-2xl">Mencari data siswa hanya dalam sekejap mata</p>
        <p class="text-center text-gray-700 text-lg md:text-xl max-w-2xl">Input dan simpan data menjadi lebih cepat</p>
        <p class="text-center text-gray-700 text-lg md:text-xl max-w-2xl">Menghindari human error pada saat pengerjaan</p>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>
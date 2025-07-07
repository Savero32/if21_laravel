<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation') {{-- Top Navigation --}}

        <div class="flex">
            {{-- Sidebar --}}
            <aside class="w-64 bg-white shadow-md h-screen px-4 py-6 space-y-2">
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}"
                       class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('fakultas.index') }}"
                       class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('fakultas.*') ? 'bg-gray-200 font-semibold' : '' }}">
                        Fakultas
                    </a>
                    <a href="{{ route('prodi.index') }}"
                       class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('prodi.*') ? 'bg-gray-200 font-semibold' : '' }}">
                        Program Studi
                    </a>
                    <a href="{{ route('mahasiswa.index') }}"
                       class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('mahasiswa.*') ? 'bg-gray-200 font-semibold' : '' }}">
                        Mahasiswa
                    </a>
                    <a href="{{ route('jadwal.index') }}"
                       class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('jadwal.*') ? 'bg-gray-200 font-semibold' : '' }}">
                        Jadwal
                    </a>
                </nav>
            </aside>

            {{-- Main Content --}}
            <main class="flex-1 p-6">
                @isset($header)
                    <header class="bg-white shadow mb-4">
                        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tasks for Today') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-900">
        <nav class="bg-white border-b border-gray-200 shadow-sm">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('welcome') }}" class="font-bold text-lg text-blue-600">
                            Tasks for Today
                        </a>
                        <a href="{{ route('welcome') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Home</a>
                        <a href="{{ route('tasks.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Task List</a>
                        <a href="{{ route('profile') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Profile</a>
                        <a href="{{ route('about') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">About</a>
                    </div>

                    <div class="flex items-center space-x-4">
                        @auth
                            <span class="text-sm text-gray-600">Hi, <strong>{{ Auth::user()->name ?? Auth::user()->full_name }}</strong></span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-sm bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded">
                                    Log Out
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Log In</a>
                            <a href="{{ route('register') }}" class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </body>
</html>
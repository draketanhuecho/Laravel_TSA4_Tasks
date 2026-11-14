<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel POS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS & Alpine.js CDN (No npm required) -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <style>
            table { width: 100%; border-collapse: collapse; margin-top: 1rem; background: #fff; }
            th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
            th { background-color: #f4f4f4; font-weight: 600; }
            .container { max-width: 1000px; margin: 0 auto; padding: 1.5rem; }
            .btn { display: inline-block; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 0.9rem; cursor: pointer; }
            .btn-primary { background-color: #2563eb; color: #fff; border: none; }
            .btn-warning { background-color: #f59e0b; color: #fff; }
            .btn-secondary { background-color: #6b7280; color: #fff; }
            .form-control { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-top: 4px; }
            .mb-3 { margin-bottom: 1rem; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="py-6">
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>
    </body>
</html>
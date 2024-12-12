<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

<<<<<<< HEAD
    {{-- Fetch settings globally --}}
    @php
        $settings = \App\Models\Setting::first() ?? new \App\Models\Setting();
    @endphp


    <title>{{ $settings->site_name ?? config('app.name', 'Laravel') }}</title>


    {{-- Favicon Handling --}}
    @if ($settings->favicon)
        <link rel="icon" type="image/png" href="{{ Storage::url($settings->favicon) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    @endif


    {{-- SEO Meta Tags --}}
    <meta name="description" content="{{ $settings->site_description ?? '' }}">


    {{-- Open Graph Tags --}}
    <meta property="og:site_name" content="{{ $settings->site_name ?? config('app.name') }}">
    <meta property="og:description" content="{{ $settings->site_description ?? '' }}">

    {{-- Logo for Social Sharing --}}
    @if ($settings->site_logo)
        <meta property="og:image" content="{{ Storage::url($settings->site_logo) }}">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- Navigation Component --}}
        <livewire:layout.navigation />
        {{-- Main Content --}}
        <main>
            @yield('content')
        </main>
        <div>
            {{-- Footer Component --}}
            <livewire:frontend.footer />

        </div>


        @livewireScripts
        @stack('scripts')
</body>

=======
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
>>>>>>> origin/master
</html>
